<?php

namespace CarMaintenance\Services;

use CarMaintenance\Entities;
use CarMaintenance\Events\Services\CustomerCreated;
use CarMaintenance\Exceptions\Repositories\RepositoryException;
use CarMaintenance\Exceptions\Services\ServiceException;
use CarMaintenance\Repositories;
use Illuminate\Support\MessageBag;

/**
 * Class CustomerService.
 */
class CustomerService
{
    /**
     * @var Repositories\CustomerRepository
     */
    private $customers;

    /**
     * CustomerService constructor.
     *
     * @param Repositories\CustomerRepository $customers
     */
    public function __construct(Repositories\CustomerRepository $customers)
    {
        $this->customers = $customers;
    }

    /**
     * @return Entities\Customer
     *
     * @throws ServiceException
     */
    public function create()
    {
        try {
            $customer = new Entities\Customer();

            $this->customers->save($customer);
//        } catch (ValueObjectException $e) {
//            throw new ServiceException($e->getErrors());
        } catch (RepositoryException $e) {
            throw new ServiceException($e->getErrors());
        } catch (\Exception $e) {
            throw new ServiceException(new MessageBag([$e->getMessage()]));
        }

        event(new CustomerCreated($customer));

        return $customer;
    }
}
