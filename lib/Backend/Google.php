<?php
/**
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Samy NASTUZZI <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files_external_gdrive\Backend;

use OCP\IL10N;
use OCA\Files_External\Lib\Auth\AuthMechanism;
use OCA\Files_External\Lib\Backend\Backend;

class Google extends Backend
{
    public function __construct(IL10N $l)
    {
        $appWebPath = \OC_App::getAppWebPath('files_external_gdrive');

        $this
        ->setIdentifier('files_external_gdrive')
        ->addIdentifierAlias('\OC\Files\External_Storage\GoogleDrive')
        // legacy compat
        ->setStorageClass('\OCA\Files_external_gdrive\Storage\GoogleDrive')
        ->setText($l->t('Google Drive'))
        ->addParameters([
        // all parameters handled in OAuth2 mechanism
        ])
        ->addAuthScheme(AuthMechanism::SCHEME_OAUTH2)
        ->addCustomJs("../../../..$appWebPath/js/gdrive");
    }
}
