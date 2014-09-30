<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\CoreBundle\Repository;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * NewsletterUser repository.
 *
 * @author Jorge Romeo <jromeosalazar@gmail.com>
 */
class NewsletterUserRepository extends EntityRepository
{   
    /**
     * Filter by  parameter.
     *
     * @param array $criteria
     */
    public function filterByCriteria($criteria = array()) {

        $queryBuilder = $this->getQueryBuilder();

        if (!empty($criteria['provinces'])) {
            $queryBuilder
                ->andWhere($this->getAlias().'.province IN (:provinces)')
                ->setParameter('provinces', $criteria['provinces'])
            ;
        }

        if (!empty($criteria['actividades'])) {
            $queryBuilder
                ->andWhere($this->getAlias().'.actividad IN (:actividades)')
                ->setParameter('actividades', $criteria['actividades'])
            ;
        }

        return $queryBuilder
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Create filter paginator.
     *
     * @param array $criteria
     * @param array $sorting
     *
     * @return PagerfantaInterface
     */
    public function createFilterPaginator($criteria = array(), $sorting = array())
    {
        $queryBuilder = parent::getCollectionQueryBuilder()
            ->select('newsletterUser')
        ;

        if (!empty($criteria['name'])) {
            $queryBuilder
                ->andWhere('newsletterUser.name LIKE :name')
                ->setParameter('name', '%'.$criteria['name'].'%')
            ;
        }

        if (!empty($criteria['email'])) {
            $queryBuilder
                ->andWhere('newsletterUser.email LIKE :email')
                ->setParameter('email', '%'.$criteria['email'].'%')
            ;
        }

        if (empty($sorting)) {
            if (!is_array($sorting)) {
                $sorting = array();
            }
            $sorting['id'] = 'desc';
        }

        $this->applySorting($queryBuilder, $sorting);

        return $this->getPaginator($queryBuilder);
    }

    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'newsletterUser';
    }
}
