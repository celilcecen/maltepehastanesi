<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\News;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('homepage', function (BreadcrumbTrail $trail) {
    $trail->push(text('homepage'), localeRoute('homepage'));
});

// Home > News
Breadcrumbs::for('news.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('news'), localeRoute('news.index'));
});

// Home > News > [News Show]
Breadcrumbs::for('news.show', function (BreadcrumbTrail $trail, $news) {
    $trail->parent('news.index');
    $trail->push($news->title, localeRoute('news.show', ["slug" => $news->slug]));
});

// Home > Contact Us
Breadcrumbs::for('contactUs', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('contact'), localeRoute('contactUs'));
});

// Home > Blogs
Breadcrumbs::for('blogs.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('blogs'), localeRoute('blogs.index'));
});

// Home > Blogs > [Blog Show]
Breadcrumbs::for('blogs.show', function (BreadcrumbTrail $trail, $blog) {
    $trail->parent('blogs.index');
    $trail->push($blog->title, localeRoute('blogs.show', ["slug" => $blog->slug]));
});

// healthAtHome
Breadcrumbs::for('healthAtHome', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('healthAtHome'), localeRoute('healthAtHome'));
});

Breadcrumbs::for('campaigns.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('campaigns'), localeRoute('campaigns.index'));
});

Breadcrumbs::for('campaigns.show', function (BreadcrumbTrail $trail, $campaign) {
    $trail->parent('campaigns.index');
    $trail->push($campaign->title, localeRoute('campaigns.show', ["slug" => $campaign->slug]));
});

Breadcrumbs::for('kurumsal.show', function (BreadcrumbTrail $trail,$corporatePage) {
    $trail->parent('homepage');
    $trail->push($corporatePage->title, localeRoute('checkups.show', ["slug" => $corporatePage->slug]));
});

Breadcrumbs::for('patientGuide', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('patientGuide'), localeRoute('patients.guide'));
});

Breadcrumbs::for('qualityCertificate', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('qualityCertificate'), localeRoute('kurumsal.qualityCertificate'));
});

Breadcrumbs::for('kurumsal', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('institutional'), localeRoute('kurumsal.aboutUs'));
});
Breadcrumbs::for('kurumsal.aboutUs', function (BreadcrumbTrail $trail) {
    $trail->parent('kurumsal');
    $trail->push(text('aboutUs'), localeRoute('kurumsal.aboutUs'));
});

Breadcrumbs::for('kurumsal.vision', function (BreadcrumbTrail $trail) {
    $trail->parent('kurumsal');
    $trail->push(text('visiontext'), localeRoute('kurumsal.vision'));
});


Breadcrumbs::for('checkups.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('checkups'), localeRoute('checkups.index'));
});

Breadcrumbs::for('checkups.show', function (BreadcrumbTrail $trail, $checkup_type) {
    $trail->parent('checkups.index');
    $trail->push($checkup_type->title, localeRoute('checkups.show', ["slug" => $checkup_type->slug]));
});

Breadcrumbs::for('stories', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('stories'), localeRoute('stories'));
});

Breadcrumbs::for('appointment', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('appointment'), localeRoute('appointment'));
});

Breadcrumbs::for('eResult', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('eResult'), localeRoute('eResult'));
});

Breadcrumbs::for('staticPage.index', function (BreadcrumbTrail $trail,$page) {
    $trail->parent('homepage');
    $trail->push($page->title, localeRoute('staticPage',["slug" => $page->slug]));
});

Breadcrumbs::for('askForPrice', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('askForPrice'), localeRoute('askForPrice'));
});

Breadcrumbs::for('HumanResources', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('HumanResources'), localeRoute('kurumsal.HumanResources'));
});

Breadcrumbs::for('searchResult', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push(text('searchResult'), localeRoute('searchResult'));
});


Breadcrumbs::for('author.show', function (BreadcrumbTrail $trail, $author) {
    $trail->parent('blogs.index');
    $trail->push($author->name, localeRoute('author.show', ["slug" => $author->id]));
});


