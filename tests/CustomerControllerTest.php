<?php

use App\Customer;

class CustomerControllerTest extends TestCase
{
    private $endpoint = 'api/customers';

    /**
     * @return array
     */
    public function returnStructureCustomer()
    {
        return ([
            'name',
            'date_of_birth',
            'cep',
            'sex',
            'address',
            'number',
            'neighborhood',
            'complement',
            'state',
            'city',
        ]);
    }

    public function testShouldGetCustomersList()
    {
        factory(Customer::class, 10)->create();

        $this->get($this->endpoint);
        $this->seeStatusCode(200);
    }

    public function testShouldGetCustomerById()
    {
        /** @var Customer $customer */
        $customer = factory(Customer::class)->create();

        $url = sprintf('%s/%s', $this->endpoint, $customer->id);

        $this->get($url);
        $this->seeStatusCode(200);
        $this->seeJsonStructure($this->returnStructureCustomer());
    }

    public function testShouldCreatCustomer()
    {
        /** @var Customer $newCustomer */
        $newCustomer = factory(Customer::class)
            ->make()
            ->toArray();

        $this->post($this->endpoint, $newCustomer);
        $this->seeStatusCode(201);
        $this->seeJsonStructure($this->returnStructureCustomer());
    }

    public function testShouldEditCustomer()
    {
        /** @var Customer $customer */
        $customer = factory(Customer::class)->create();

        /** @var Customer $editCustomer */
        $editCustomer = factory(Customer::class)->make();
        $editCustomer->id = $customer->id;

        $url = sprintf('%s/%s', $this->endpoint, $customer->id);

        $this->put($url, $editCustomer->toArray());
        $this->seeStatusCode(200);
        $this->seeJsonStructure($this->returnStructureCustomer());
    }

    public function testShouldDeleteCustomer()
    {
        /** @var Customer $customer */
        $customer = factory(Customer::class)->create();

        $url = sprintf('%s/%s', $this->endpoint, $customer->id);

        $this->delete($url);
        $this->seeStatusCode(204);

        $customerDelete = Customer::find($customer->id);

        $this->assertEquals(null, $customerDelete);
    }
}

