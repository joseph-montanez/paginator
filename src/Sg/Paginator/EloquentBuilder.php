<?php namespace Sg\Paginator;

use Illuminate\Database\Eloquent\Builder;

class EloquentBuilder extends Builder
{

    /**
     * Get a paginator for the "select" statement.
     *
     * @param  int    $perPage
     * @param  array  $columns
     */
    public function paginate($perPage = null, $columns = array('*'))
    {
        // Figure out the current page
        $total = $this->query->getPaginationCount();

        // Once we have the paginator we need to set the limit and offset values for
        // the query so we can get the properly paginated items. Once we have an
        // array of items we can create the paginator instances for the items.
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $this->query->forPage($page, $perPage);

        
    }

}