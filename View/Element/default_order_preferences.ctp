<p>
    <label><?php echo __('Field for default order') ?></label>
    <?php
    echo $this->Form->select(
        'UserPreference.pref.cc_default_order.key',
        array(
            "Tracker.position" => "Tracker",
            "Status.position" => "Status",
            "Priority.position" => "Priority",
        )
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
