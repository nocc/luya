<?php
namespace cmsadmin;

class Module extends \admin\base\Module
{
    public static $apis = [
        'api-cms-admin' => 'cmsadmin\\apis\\AdminController',
        'api-cms-navitemplageblockitem' => 'cmsadmin\\apis\\NavItemPageBlockItemController',
        'api-cms-defaults' => 'cmsadmin\apis\DefaultsController',
        'api-cms-nav' => 'cmsadmin\apis\NavController',
        'api-cms-navitem' => 'cmsadmin\\apis\\NavItemController',
        'api-cms-menu' => 'cmsadmin\apis\MenuController', // should put into api-cms-admin
        //'api-cms-navitempage' => 'cmsadmin\apis\NavItemPageController', // should put into api-cms-admin
        //'api-cms-navitemmodule' => 'cmsadmin\\apis\\NavItemModuleController',
        'api-cms-layout' => 'cmsadmin\\apis\\LayoutController',
        'api-cms-block' => 'cmsadmin\\apis\\BlockController',
        'api-cms-blockgroup' => 'cmsadmin\\apis\\BlockgroupController',
        'api-cms-cat' => 'cmsadmin\apis\CatController',
        
    ];

    public $assets = [
        'cmsadmin\Asset',
    ];
    
    public function getMenu()
    {
        return $this
            ->node("CMS Inhalt", "fa-th-list", "cmsadmin-default-index")
            ->node("CMS Settings", "fa-wrench")
                ->group("Verwalten")
                    ->item("KategorieN", "cmsadmin-cat-index", "fa-ils")
                    ->item("Layout", "cmsadmin-layout-index", "fa-eyedropper")
                ->group("Blöcke")
                    ->item("Gruppen", "cmsadmin-blockgroup-index", "fa-group")
                    ->item("Verwalten", "cmsadmin-block-index", "fa-outdent")
            ->menu();
                
        /*
        $this->menu->createNode('cms', 'CMS Inhalte', 'fa-th-list', 'cmsadmin-default-index');

        $node = $this->menu->createNode('cms-settings', 'CMS Einstellungen', 'fa-wrench');
        $this->menu->createGroup($node, 'Verwalten', [
            $this->menu->createItem("cat", "Kategorien", "cmsadmin-cat-index", "fa-ils"),
            $this->menu->createItem("layout", "Layouts", "cmsadmin-layout-index", "fa-eyedropper"),
        ]);

        $this->menu->createGroup($node, 'Blöcke', [
            $this->menu->createItem('blockgroup', 'Gruppen', 'cmsadmin-blockgroup-index', 'fa-group'),
            $this->menu->createItem('block', "Verwalte", "cmsadmin-block-index", "fa-outdent"),
        ]);

        return $this->menu->get();
        */
    }
    
    public function getAuthApis()
    {
        return [
            ['api' => 'api-cms-cat', 'alias' => 'Kategorien/Navcontainer'],
            ['api' => 'api-cms-layout', 'alias' => 'Layouts'],
            ['api' => 'api-cms-blockgroup', 'alias' => 'Block Gruppen'],
            ['api' => 'api-cms-block', 'alias' => 'Blöcke'],
            ['api' => 'api-cms-navitemplageblockitem', 'alias' => 'Blöcke Einfügen und Verschiebe'],
        ];
    }
    
    public function getAuthRoutes()
    {
        return [
            ['route' => 'cmsadmin/default/index', 'alias' => 'Dashboard'],
            ['route' => 'cmsadmin/page/create', 'alias' => 'Seiten Erstellen'],
            ['route' => 'cmsadmin/page/update', 'alias' => 'Seiten Bearbeiten'],
        ];
    }
}
