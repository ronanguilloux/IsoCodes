# Contributing

If you've written a new validator, adapted an existing one, or fixed a bug, your contribution is welcome!

The issue queue can be found at: https://github.com/ronanguilloux/IsoCodes/issues.
[All contributors will be fully credited][6]. Just sign up for a github account, create a fork and hack away at the codebase.

Before proposing a pull request, check the following:

* Your code should follow the [PSR-2 coding standard][0]. Run `make quality` to check that the coding standards are followed, and use [php-cs-fixer][1] to fix inconsistencies.
* Unit tests should still pass after your patch. Run the tests on your dev server (with `make test`) or check the continuous integration status for your pull request.
* As much as possible, add unit tests for your code
* If you add a new or change an existing validator, please provide related new test statements and values, without removing any existing ones.
* If you add a new validator, please include documentation for it in the `README` and the `composer.json`.
* If your new validator are specific to a certain locale, please provide the locale as an option of the `validate()` method, as for the [ZipCode validator][2].
* Speed is important in all Isocodes usages. Make sure your code is optimized to generate hundred of validations in no time, without consuming too much memory or CPU.
* If you commit a new feature, be prepared to help maintaining it. Watch the project on GitHub, and please comment on issues or PRs regarding the feature you contributed.

## Submitting a Patch:

Please checkout [Guidelines for submitting a pull request][3].


## [Pull Request Template][4]: Template header to use in your pull request description;

```markdown
| Q             | A
| ------------- | ---
| Bug fix?      | yes/no
| New feature?  | yes/no
| BC breaks?    | no
| Deprecations? | no
| Tests pass?   | yes
| Fixed tickets | #1234
```

See [commit.template] to be used that way:

```bash
git commit [your options...] -t commit.template
```

Please squash all your commits in a unique one, per-contribution commit.
Based on the feedback on the pull request, you might need to rework your patch.
[Before re-submitting the patch][5], rebase with `upstream/master`, don't merge, and force the push to the origin.

By doing so, you us maintaining consistency in the VCS history.

Once your code is merged, it is available for free to everybody under the GNU/GPL v3 License. Publishing your Pull Request on the Isocodes GitHub repository means that you agree with this license for your contribution.

Thank you for your contribution! Isocodes wouldn't be so great without you.

[0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[1]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
[2]: https://github.com/ronanguilloux/IsoCodes/blob/master/src/IsoCodes/ZipCode.php
[3]: https://symfony.com/doc/current/contributing/code/patches.html#check-list
[4]: https://symfony.com/doc/current/contributing/code/patches.html#make-a-pull-request
[5]: https://symfony.com/doc/current/contributing/code/patches.html#rework-your-patch
[6]: https://github.com/ronanguilloux/IsoCodes/graphs/contributors