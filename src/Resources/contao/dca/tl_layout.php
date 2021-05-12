<?php

/*
 * Copyright (c) 2021 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

$dca = &$GLOBALS['TL_DCA']['tl_layout'];

/*
 * Palettes
 */
$dca['palettes']['__selector__'][] = 'ttUseTwig';
$dca['palettes']['__selector__'][] = 'ttFramework';

$dca['palettes']['default'] = str_replace('{sections_legend', '{tt_framework_templates_legend},ttUseTwig;{sections_legend', $dca['palettes']['default']);

/*
 * Subpalettes
 */
$dca['subpalettes']['ttUseTwig'] = 'ttFramework';

/*
 * Fields.
 */

$dca['fields']['ttUseTwig'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_layout']['ttUseTwig'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50', 'submitOnChange' => true],
    'sql' => "char(1) NOT NULL default ''",
];
$dca['fields']['ttFramework'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_layout']['ttFramework'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => [\HeimrichHannot\TwigTemplatesBundle\DataContainer\LayoutContainer::class, 'onTtFrameworkOptionsCallback'],
    'eval' => ['includeBlankOption' => true, 'submitOnChange' => true, 'tl_class' => 'w50 clr'],
    'sql' => "varchar(64) NOT NULL default ''",
];
