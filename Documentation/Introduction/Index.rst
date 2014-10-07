.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _introduction:

Introduction
============


.. _what-it-does:

What does it do?
----------------

This Extension Provides an easy way to slowly roll out a feature on your typo3-site.
to collect feedback and tune your feature along the way. and catch problems early and only
affecting a small amount of users.

this could also be used to give you A/B testing on your Typo3 site.

How Does it work
----------------

1) all Visitors of your website get a cookie with a random Floating point value between 0 and 1.

example:

+-------+------------------+
| User  | Cookie Value     |
+=======+==================+
| A     | 0.23449064005841 |
+-------+------------------+
| B     | 0.84136088464472 |
+-------+------------------+
| C     | 0.04330120409993 |
+-------+------------------+

2) In your configuration you define some "threshold" to determine how much of your users 
would be targetd by your feature.

example:
you select a threshold of 0.1 (10%) Only user C would be shown this feature. as his random number is below the threshold.
if you select a threshold of 0.5 (50%) user A + C Would be shown the Feature.

this construction allows for a steady rollout.
starting with only a small amount of users and if the feedback is good, you slowly incrase the rollout.

a detailed configuration description is shown later in this manual.