Feature Rollout Extension Manual
================================

This Extension Provides an easy way to slowly roll out a feature on your typo3-site.
to collect feedback and tune your feature along the way. and catch problems early and only
affecting a small amount of users.

this could also be used to do A/B testing on your Typo3 site.

How Does it work
----------------

1) all Visitors of your website get a cookie with a random value between 0 - 1

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
starting with only a small amount of users and if the feedback is good you slowly incrase the rollout



This is a template manual aiming to help developers when it comes to documentation.
The template provides a structure that a developer can take over and, in addition,
many useful snippets and examples. Documentation is written in reST format.

You manual may be comprised of the whole `Documentation` folder
or just of this README file. More information can be found in
`Core APIs`_.

This example manual will show you - in particular - how to make links
across manuals or how to present a TypoScript reference.

Any idea or suggestion for improving this template `can be dropped`_ to
the `Documentation Team`_.

Remember: documentation is like gift wrapping, it may look superfluous,
but your friends tend to be rather disappointed when their presents
arrive in supermarket carrier bags. (Documentation-Driven Design quote)

.. _Core APIs: http://docs.typo3.org/typo3cms/CoreApiReference/ExtensionArchitecture/Documentation/Index.html
.. _can be dropped: http://forge.typo3.org/projects/typo3cms-doc-official-extension-template/issues
.. _Documentation Team: http://forge.typo3.org/projects/typo3cms-doc-official-extension-template
