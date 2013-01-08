<?php
$pluginContainer = ClassRegistry::getObject('PluginContainer');
$pluginContainer->installed('cc_default_order','0.2');

App::uses('CakeEventManager', 'Event');

CakeEventManager::instance()->attach(function($event) {
    if( 'issues' === $event->subject->request->controller && 'index' === $event->subject->request->action ){
        $current_user = $event->subject->find_current_user();
        $userPref = array();
        if( ! $userPref['key'] = Set::get($current_user, 'UserPreference.pref.cc_default_order.key') ) $userPref['key'] = 'Priority.position';
        if( ! $userPref['direction'] = Set::get($current_user, 'UserPreference.pref.cc_default_order.direction') ) $userPref['direction'] = 'desc';
        $named = $event->subject->request->params['named'];
        $sort = Set::get($named, 'sort');
        $direction = Set::get($named, 'direction');
        $named['sort'] = $sort ? $sort : $userPref['key'];
        $named['direction'] = $direction ? $direction : $userPref['direction'];
        $event->subject->request->params['named'] = $named;
    }
}, 'Controller.initialize', array('priority' => 1));

$hookContainer = ClassRegistry::getObject('HookContainer');
$hookContainer->registerElementHook(
    'my/preferences',
    '../../Plugin/CcDefaultOrder/View/Element/default_order_preferences',
    false
);
