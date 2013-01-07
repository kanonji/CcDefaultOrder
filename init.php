<?php
$pluginContainer = ClassRegistry::getObject('PluginContainer');
$pluginContainer->installed('cc_default_order','0.1');

App::uses('CakeEventManager', 'Event');

CakeEventManager::instance()->attach(function($event) {
    if( 'issues' === $event->subject->request->controller && 'index' === $event->subject->request->action ){
        $named = $event->subject->request->params['named'];
        $sort = Set::get($named, 'sort');
        $direction = Set::get($named, 'direction');
        $named['sort'] = $sort ? $sort : 'Priority.position';
        $named['direction'] = $direction ? $direction : 'desc';
        $event->subject->request->params['named'] = $named;
    }
}, 'Controller.initialize');
