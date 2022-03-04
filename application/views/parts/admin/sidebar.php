<?php
    $user = $this->session->userData;
    $nav = [
        'Dashboard' => [
            'url' => '/dashboard',
            'icon' => 'fa-tachometer',
            'in' => ['dashboard']
        ],
        'List Folder' => [
            'url' => '#',
            'icon' => 'fa fa-folder-open',
            'in' => ['folder/b1','folder/b2', 'folder/rutin', 'folder/non-rutin'],
            'sub' => [
                'Folder B1' => [
                    'url' => '/folder/b1',
                    'icon' => 'fa fa-list',
                    'sub' => []
                ],
                'Folder B2' => [
                    'url' => '/folder/b2',
                    'icon' => 'fa fa-list'
                ],
                'Folder Rutin' => [
                    'url' => '/folder/rutin',
                    'icon' => 'fa fa-list'
                ],
                'Folder Non Rutin' => [
                    'url' => '/folder/non-rutin',
                    'icon' => 'fa fa-list'
                ],
            ]
        ],
    ]
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <h1 class="text-white font-weight-bold">Budget<p><span class="text-navy">O</span>nline</p>
                    </h1>
                    <p class="text-white"><?= $user->hak_akses ?> | <?= $user->divisi ?></p>
                </div>
            </li>
            <?php foreach ($nav as $key => $value): ?>
            <li class="<?= in_array(uri_string(), $value["in"]) ? "active" : "" ?>">
                <a href="<?= base_url($value['url']) ?>" aria-expanded="false">
                    <i class="<?= $value['icon'] ?>"></i>
                    <span class="nav-label"><?= $key ?></span>
                    <?php if (isset($value['sub'])): ?>
                        <span class="fa arrow"></span>
                    <?php endif ?>
                </a>
                <?php if (isset($value['sub'])): ?>
                    <ul class="nav nav-second-level collapse <?= in_array(uri_string(), $value["in"]) ? "in" : "" ?>" aria-expanded="true" style="">
                    <?php foreach ($value['sub'] as $k => $sub): ?>
                        <li class="<?= strpos(current_url(), $sub['url']) ? "active" : "" ?>">
                            <a href="<?= base_url($sub['url']) ?>" aria-expanded="false">
                                <i class="<?= $sub['icon'] ?>"></i>
                                <span class="nav-label"><?= $k ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
            <?php endforeach ?>
        </ul>

    </div>
</nav>