<?php

/*
 * This file is part of the yuki package.
 * Copyright (c) 2011 olamedia <olamedia@gmail.com>
 *
 * This source code is release under the MIT License.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * yStyleTag
 *
 * @package yuki
 * @subpackage html
 * @author olamedia
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @version SVN: $Id: yStyleTag.php 1620 2011-03-12 01:46:36Z olamedia@gmail.com $
 */
class yStyleTag extends yHtmlTag{
    public function __construct($attr = array()){
        parent::__construct('style', $attr);
        $this['type'] = 'text/css';
    }
}

