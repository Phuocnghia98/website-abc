<?php

namespace Modules\Contact\Events;

use Modules\Media\Contracts\DeletingMedia;
use Modules\Contact\Entities\Contact;
use PhpParser\Node\Expr\BinaryOp\Concat;

class ContactWasDeleted implements DeletingMedia
{
    /**
     * @var Contact
     */
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->contact->id;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->contact);
    }
}