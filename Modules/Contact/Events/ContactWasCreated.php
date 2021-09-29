<?php

namespace Modules\Contact\Events;

use Modules\Media\Contracts\StoringMedia;
use Modules\Contact\Entities\Contact;

class ContactWasCreated implements StoringMedia
{
    /**
     * @var Contact
     */
    private $contact;
    /**
     * @var array
     */
    private $data;

    public function __construct(Contact $contact, array $data)
    {
        $this->contact = $contact;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->contact;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}