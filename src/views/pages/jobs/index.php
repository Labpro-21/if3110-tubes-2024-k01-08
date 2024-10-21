<?php

use src\dao\JobType;
use src\dao\LocationType;

?>

<div class="container">
    <!-- For filters & sorts -->
    <aside class="card--filter">
        <form method="GET" class="filter-form">
            <!-- Hidden search input, to presever navbar search state while getting subitted -->
            <input type="hidden" name="search"
                <?php if (isset($filters['search'])): ?>
                <?= 'value="' . htmlspecialchars($filters['search'], ENT_QUOTES, "utf-8") . '"' ?>
                <?php else: ?>
                <?= 'value=""' ?>
                <?php endif; ?>>


            <!-- Sort created at -->
            <div class="filter-form__section">
                <h2 class="filter-form__section-title">Sort by</h2>

                <div class="filter-form__group">
                    <label for="sort-created-at" class="filter-form__label">
                        Created At
                    </label>

                    <div class="select-wrapper filter-form__select-wrapper">
                        <select class="custom-select filter-form__custom-select" name="sort-created-at" aria-label="Select an option">
                            <option value="" disabled hidden <?php if (!isset($filters['is-created-at-asc'])): ?> <?= 'selected' ?> <?php endif; ?>>Select an option</option>
                            <option value="newest-first" <?php if (isset($filters['is-created-at-asc']) && $filters['is-created-at-asc'] === false): ?> <?= 'selected' ?><?php endif; ?>>Newest First</option>
                            <option value="oldest-first" <?php if (isset($filters['is-created-at-asc']) && $filters['is-created-at-asc'] === true): ?> <?= 'selected' ?><?php endif; ?>>Oldest First</option>
                        </select>

                        <svg class="custom-select__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Filters -->
            <div class="filter-form__section">
                <h2 class="filter-form__section-title">Filter by</h2>

                <div class="filter-form__groups">
                    <!-- Date range -->
                    <div class="filter-form__group">
                        <label for="created-at-from" class="filter-form__label">Date From</label>
                        <input type="date" name="created-at-from" class="input filter-form__input--date"
                            <?php if (isset($filters['created-at-from'])): ?>
                            <?= 'value="' . htmlspecialchars($filters['created-at-from']->format('Y-m-d'), ENT_QUOTES, "utf-8") . '"' ?>
                            <?php else: ?>
                            <?= 'value=""' ?>
                            <?php endif; ?>>
                    </div>

                    <div class="filter-form__group">
                        <label for="created-at-to" class="filter-form__label">Date To</label>
                        <input type="date" name="created-at-to" class="input filter-form__input--date"
                            <?php if (isset($filters['created-at-to'])): ?>
                            <?= 'value="' . htmlspecialchars($filters['created-at-to']->format('Y-m-d'), ENT_QUOTES, "utf-8") . '"' ?>
                            <?php else: ?>
                            <?= 'value=""' ?>
                            <?php endif; ?>>
                    </div>

                    <!-- Open / closed -->
                    <fieldset>
                        <legend class="filter-form__label">Status</legend>

                        <label class="checkbox-container">
                            <input name="is-opens[]" type="checkbox" value="true"
                                <?php if (isset($filters['is-opens']) && in_array(true, $filters['is-opens'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">Open</span>
                        </label>

                        <label class="checkbox-container">
                            <input name="is-opens[]" type="checkbox" value="false"
                                <?php if (isset($filters['is-opens']) && in_array(false, $filters['is-opens'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">Closed</span>
                        </label>
                        </legend>
                    </fieldset>

                    <!-- Job type -->
                    <fieldset>
                        <legend class="filter-form__label">Job Type</legend>

                        <label class="checkbox-container">
                            <input name="job-types[]" value="full-time" type="checkbox"
                                <?php if (isset($filters['job-types']) && in_array(JobType::FULL_TIME, $filters['job-types'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">Full Time</span>
                        </label>

                        <label class="checkbox-container">
                            <input name="job-types[]" value="part-time" type="checkbox"
                                <?php if (isset($filters['job-types']) && in_array(JobType::PART_TIME, $filters['job-types'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">Part Time</span>
                        </label>

                        <label class="checkbox-container">
                            <input name="job-types[]" value="internship" type="checkbox"
                                <?php if (isset($filters['job-types']) && in_array(JobType::INTERNSHIP, $filters['job-types'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">Internship</span>
                        </label>
                    </fieldset>

                    <!-- Location Type -->
                    <fieldset>
                        <legend class="filter-form__label">Location Type</legend>

                        <label class="checkbox-container">
                            <input name="location-types[]" value="on-site" type="checkbox"
                                <?php if (isset($filters['location-types']) && in_array(LocationType::ON_SITE, $filters['location-types'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">On-Site</span>
                        </label>

                        <label class="checkbox-container">
                            <input name="location-types[]" value="hybrid" type="checkbox"
                                <?php if (isset($filters['location-types']) && in_array(LocationType::HYBRID, $filters['location-types'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">Hybrid</span>
                        </label>

                        <label class="checkbox-container">
                            <input name="location-types[]" value="remote" type="checkbox"
                                <?php if (isset($filters['location-types']) && in_array(LocationType::REMOTE, $filters['location-types'])): ?>
                                <?= 'checked' ?>
                                <?php endif; ?>>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">Remote</span>
                        </label>
                    </fieldset>
                </div>
            </div>

            <div class="filter-form__actions">
                <!-- Reset Filter -->
                <a href="/company/jobs">
                    <button type="button" class="button button--secondary button--icon--sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter-x icon--sm">
                            <path d="M13.013 3H2l8 9.46V19l4 2v-8.54l.9-1.055" />
                            <path d="m22 3-5 5" />
                            <path d="m17 3 5 5" />
                        </svg>
                    </button>
                </a>


                <!-- Submit -->
                <button formnovalidate type="submit" class="button button--default-color button--sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search icon--sm--margin">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <span>
                        Apply
                    </span>
                </button>
            </div>
        </form>
    </aside>

    <!-- For job lists -->
    <main class="card--jobs">
        <!-- Title -->
        <header class="card--jobs__header">
            <!-- Title -->
            <div>
                <h1 class="header__title">
                    Jobs
                </h1>

                <p class="header__description">
                Discover new opportunities daily and take control of your career path
                </p>
            </div>
        </header>

        <!-- Job lists -->
        <?php if (empty($jobs)): ?>
            <!-- Empty state -->
            <div class="job-list--empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" x2="12" y1="8" y2="12" />
                    <line x1="12" x2="12.01" y1="16" y2="16" />
                </svg>
                <p class="job-list--empty__text">
                    No Jobs Found
                </p>
            </div>
        <?php else: ?>
            <!-- Non empty -->
            <ul class="job-list" id="job-list">
                <?php foreach ($jobs as $job): ?>
                    <li>
                        <article class="job-article">
                            <!-- Header -->
                            <header class="job-article__header">
                                <!-- Title -->
                                <h3 class="job-article__title">
                                    <?= htmlspecialchars($job->getPosition()) ?>
                                </h3>

                                <!-- Tags -->
                                <div class="job-article__tags">
                                    <?php if ($job->getIsOpen()): ?>
                                        <div class="badge badge--green">
                                            Open
                                        </div>
                                    <?php else: ?>
                                        <div class="badge badge--destructive">
                                            Closed
                                        </div>
                                    <?php endif; ?>

                                    <div class="badge badge--outline">
                                        <?= htmlspecialchars(JobType::renderText($job->getJobType())) ?>
                                    </div>

                                    <div class="badge badge--secondary">
                                        <?= htmlspecialchars(LocationType::renderText($job->getLocationType())) ?>
                                    </div>
                                </div>

                                <!-- Created at -->
                                <p class="job-article__description">
                                    Created at <?= htmlspecialchars($job->getCreatedAt()->format('m/d/Y')) ?>
                                </p>
                            </header>

                            <!-- Actions -->
                            <div class="job-article__actions">
                                <!-- View -->
                                <a href="/jobs/<?= htmlspecialchars($job->getJobId(), ENT_QUOTES, 'utf-8') ?>">
                                    <button class="button button--outline button--sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye icon--sm--margin">
                                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <span>
                                            View
                                        </span>
                                    </button>
                                </a>
                            </div>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Pagination -->
            <div class="card--jobs__pagination">
                <?= $paginationComponent ?>
            </div>
        <?php endif; ?>
    </main>
</div>