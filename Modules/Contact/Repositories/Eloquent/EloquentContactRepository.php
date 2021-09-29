<?php

namespace Modules\Contact\Repositories\Eloquent;

use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Contact\Events\ContactWasCreated;
use Modules\Contact\Events\ContactWasUpdated;
use Modules\Contact\Events\ContactWasDeleted;
use Illuminate\Database\Eloquent\Builder;
class EloquentContactRepository extends EloquentBaseRepository implements ContactRepository
{
    public function update($contact, $data)
    {
        
        $contact->update($data);

        event(new ContactWasUpdated($contact, $data));

        return $contact;
    }
 
    
    /**
     * Create a blog post
     * @param  array $data
     * @return Post
     */
    public function create($data)
    {
    
        $contact = $this->model->create($data);


        event(new ContactWasCreated($contact, $data));

        return $contact;
    }

    public function destroy($contact)
    {
   

        event(new ContactWasDeleted($contact));

        return $contact->delete();
    }
}
