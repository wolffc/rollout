.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

Target group: **Administrators**

Describes how to manage the extension from an administrator point of view.
That relates to Page/User TSconfig, permissions, configuration etc.,
which administrator level users have access to.

Language should be non / semi-technical, explaining, using small examples.


.. _admin-installation:

Installation
------------

- How should the extension be installed?
- Are they dependencies to resolve?
- Is it a static template file to be included?

To install the extension, perform the following steps:

#. Go to the Extension Manager
#. Install the extension
#. add Feature Configuration to localconf.php or AdditionalConfiguration.php (Typo3 6.2+) 


.. _admin-configuration:

Configuration
-------------
The configuration of The Extension is stored $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rollout']
this means you have to edit your localconf.php or AdditionalConfiugration.php (in Newer Typo3 Versions)

Example:

.. code-block:: php
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rollout']['features']= array(
        'my_first_feature' => array(
                'threshold' => 0.1,
        ),
        'my_second_feature' => array(
                'threshold' => 0.5,
        ),
	);


Here you see to Features defined "my_frist_feature" and "my_second_feature" are just names to identify your
its recomend to give them readable names.

threshold Parameter 
	defines how much of your users get to see this feature. 0 means nobody 1 means everybody. 0.5 means 50% of your users.
	0.1 means 10%, 0.05 means 5%. and so on. 



.. _admin-faq:

FAQ
---

Possible subsection: FAQ

Subsection
^^^^^^^^^^

Some subsection

Sub-subsection
""""""""""""""

Deeper into the structure...
