<?php
/**
 * The home page of your project. Change it freely.
 *
 * @var string $version BrewPHP version
 * @var bool $debug
 */
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome to BrewPHP</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap">
<style>
:root {
    --primary: #6F4E37;
    --accent: #C8A27A;
    --bg: #FAF7F2;
    --surface: #FFFFFF;
    --text: #2B211B;
    --muted: #6E6259;
    --border: #E8DFD3;
    --code-bg: #F3EDE4;
    --font: "Plus Jakarta Sans", system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    --mono: "JetBrains Mono", ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
}
@media (prefers-color-scheme: dark) {
    :root {
        --primary: #C8A27A;
        --accent: #E2C4A0;
        --bg: #1C1714;
        --surface: #26201C;
        --text: #F1E9DF;
        --muted: #B3A698;
        --border: #3A312B;
        --code-bg: #2E2722;
    }
}
* { box-sizing: border-box; }
body { margin: 0; background: var(--bg); color: var(--text); font: 400 16px/1.6 var(--font); }
a { color: var(--primary); text-underline-offset: 3px; }
a:hover { color: var(--accent); }
code { font-family: var(--mono); font-size: 14px; background: var(--code-bg); padding: 2px 6px; border-radius: 4px; }
main { max-width: 960px; margin: 0 auto; padding: 96px 24px 48px; }
.cup { width: 64px; height: 64px; color: var(--primary); margin-bottom: 24px; }
.eyebrow { font-size: 13px; font-weight: 600; letter-spacing: .04em; text-transform: uppercase; color: var(--primary); }
h1 { font-size: 48px; line-height: 1.15; letter-spacing: -.02em; margin: 8px 0 16px; }
.lead { font-size: 20px; color: var(--muted); max-width: 640px; margin: 0 0 48px; }
.steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px; margin-bottom: 48px; }
.card { background: var(--surface); border: 1px solid var(--border); border-radius: 8px; padding: 24px; }
.card h2 { font-size: 18px; margin: 0 0 8px; }
.card p { margin: 0; color: var(--muted); }
.links { display: flex; flex-wrap: wrap; gap: 24px; font-weight: 600; }
footer { margin-top: 48px; color: var(--muted); font-size: 14px; }
</style>
</head>
<body>
<main>
    <svg class="cup" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" aria-hidden="true">
        <path d="M10 26h36v14a16 16 0 0 1-16 16h-4a16 16 0 0 1-16-16z"/>
        <path d="M46 30h4a7 7 0 0 1 0 14h-5"/>
        <path d="M22 8c-3 4 3 6 0 10M32 8c-3 4 3 6 0 10"/>
    </svg>
    <div class="eyebrow">BrewPHP <?= e($version) ?></div>
    <h1>Welcome to BrewPHP</h1>
    <p class="lead">Your project is up and running. Here is where to go next.</p>

    <div class="steps">
        <div class="card">
            <h2>Edit this page</h2>
            <p>It lives in <code>apps/pages/templates/pages/home.php</code>, rendered by the <code>home</code> view in <code>apps/pages/views.php</code>.</p>
        </div>
        <div class="card">
            <h2>Add a route</h2>
            <p>Map URLs to views in <code>apps/pages/urls.php</code>, then list them with <code>php manage.php routes</code>.</p>
        </div>
        <div class="card">
            <h2>Check your setup</h2>
            <p>Run <code>php manage.php check</code> to catch configuration problems early.</p>
        </div>
    </div>

    <nav class="links">
        <a href="https://docs.brewphp.dev">Documentation</a>
        <a href="https://docs.brewphp.dev/topics/routing/">Routing</a>
        <a href="https://docs.brewphp.dev/topics/views/">Views</a>
        <a href="https://docs.brewphp.dev/cli/overview/">manage.php</a>
        <a href="https://github.com/brewphp/brewphp">GitHub</a>
    </nav>

    <footer>
        <?php if ($debug) : ?>
            Debug mode is on. Turn it off in <code>.env</code> before going live.
        <?php else : ?>
            Brewed with BrewPHP.
        <?php endif ?>
    </footer>
</main>
</body>
</html>
