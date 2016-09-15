<?php

namespace Kanboard\Plugin\TaskBoardDate\Filter;

use Kanboard\Core\Filter\FilterInterface;
use Kanboard\Filter\BaseFilter;
use Kanboard\Model\TaskModel;
use PicoDb\Table;

/**
 * 
 */
class TaskBoardDateRangeFilter extends BaseFilter implements FilterInterface
{
    /**
     * Get search attribute
     *
     * @access public
     * @return string[]
     */
    public function getAttributes()
    {
        return array('wv_between');
    }

    /**
     * Apply filter
     *
     * @access public
     * @return FilterInterface
     */
    public function apply()
    {
        $parts = explode(",",$this->value);
        $this->query->gte(TaskModel::TABLE.'.date_board', is_numeric($parts[0]) ? $parts[0] : strtotime($parts[0]));
        $this->query->lte(TaskModel::TABLE.'.date_board', is_numeric($parts[1]) ? $parts[1] : strtotime($parts[1]));
        return $this;
    }
}
