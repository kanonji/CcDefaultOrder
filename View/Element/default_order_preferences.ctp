<p>
    <label><?php echo __('Field for default order') ?></label>
    <?php
    $QueriesHelper = $this->Helpers->load('Queries');
    $QueryColumnHelper = $this->Helpers->load('QueryColumn');
    $options = array();
    foreach( $QueriesHelper->columns() as $column ){
        if( $sort = $QueryColumnHelper->sortable($column) ) $options[$sort] = $column;
    }
    echo $this->Form->select(
        'UserPreference.pref.cc_default_order.key',
        $options
    );
    ?>
</p>
<p>
    <label><?php echo __('Direction for default order') ?></label>
    <?php
    echo $this->Form->select(
        'UserPreference.pref.cc_default_order.direction',
        array(
            "desc" => "Desc",
            "asc" => "Asc",
        )
    );
    ?>
</p>
