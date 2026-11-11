<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#142d4e">
    <title>@yield('title', 'University Visitor Records') | VisitorCHED</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --university-navy: #142d4e;
            --university-blue: #1d4773;
            --university-teal: #157a78;
            --page-bg: #f3f6f9;
            --muted: #64748b;
            --line: #e3e9ef;
        }

        body {
            min-height: 100vh;
            background: var(--page-bg);
            color: #233247;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }

        .site-header {
            background: #fff;
            border-bottom: 1px solid var(--line);
        }

        .header-inner,
        .page-content,
        .site-footer {
            max-width: 1160px;
            margin: 0 auto;
            padding-right: 1.5rem;
            padding-left: 1.5rem;
        }

        .header-inner {
            min-height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: .85rem;
            color: var(--university-navy);
            text-decoration: none;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--university-navy);
            color: #fff;
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: .04em;
        }

        .brand-name {
            display: block;
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-caption,
        .eyebrow {
            color: var(--muted);
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .brand-caption {
            display: block;
            margin-top: .2rem;
            font-size: .65rem;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .header-nav .nav-link {
            padding: .6rem .85rem;
            color: #526174;
            font-size: .92rem;
            font-weight: 600;
        }

        .header-nav .nav-link.active,
        .header-nav .nav-link:hover {
            color: var(--university-blue);
        }

        .page-content {
            padding-top: 2.5rem;
            padding-bottom: 3rem;
        }

        .page-heading {
            margin-bottom: 1.75rem;
        }

        .page-heading h1 {
            margin: .35rem 0 .45rem;
            color: var(--university-navy);
            font-size: clamp(1.7rem, 3vw, 2.2rem);
            font-weight: 700;
            letter-spacing: -.035em;
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
        }

        .record-card,
        .summary-card {
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(20, 45, 78, .045);
        }

        .record-card {
            overflow: hidden;
        }

        .card-heading {
            padding: 1.15rem 1.35rem;
            border-bottom: 1px solid var(--line);
        }

        .card-heading h2 {
            margin: 0;
            color: var(--university-navy);
            font-size: 1rem;
            font-weight: 700;
        }

        .card-heading p {
            margin: .25rem 0 0;
            color: var(--muted);
            font-size: .88rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .summary-card {
            height: 100%;
            padding: 1.2rem 1.35rem;
        }

        .summary-label {
            color: var(--muted);
            font-size: .82rem;
            font-weight: 600;
        }

        .summary-value {
            margin-top: .3rem;
            color: var(--university-navy);
            font-size: 1.7rem;
            font-weight: 700;
        }

        .table {
            --bs-table-bg: transparent;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            padding: .85rem 1rem;
            border-bottom-color: var(--line);
            color: var(--muted);
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .table tbody td {
            padding: .95rem 1rem;
            border-bottom-color: #edf1f5;
        }

        .table tbody tr:last-child td {
            border-bottom: 0;
        }

        .record-id {
            color: var(--muted);
            font-size: .82rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .record-name {
            color: var(--university-navy);
            font-weight: 650;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            padding: .35rem .65rem;
            border-radius: 999px;
            background: #eaf5f3;
            color: #12615f;
            font-size: .78rem;
            font-weight: 700;
        }

        .form-label {
            color: #34445a;
            font-size: .88rem;
            font-weight: 650;
        }

        .form-control {
            min-height: 46px;
            border-color: #d7e0e8;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #6ea8a5;
            box-shadow: 0 0 0 .2rem rgba(21, 122, 120, .12);
        }

        .form-text {
            color: var(--muted);
        }

        .btn {
            border-radius: 8px;
            font-weight: 650;
        }

        .btn-primary {
            border-color: var(--university-blue);
            background: var(--university-blue);
        }

        .btn-primary:hover {
            border-color: var(--university-navy);
            background: var(--university-navy);
        }

        .btn-outline-secondary {
            border-color: #d4dde6;
            color: #526174;
        }

        .detail-label {
            margin-bottom: .35rem;
            color: var(--muted);
            font-size: .76rem;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        .detail-value {
            color: var(--university-navy);
            font-size: 1rem;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .site-footer {
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: .8rem;
        }

        @media (max-width: 600px) {
            .header-inner {
                min-height: auto;
                padding-top: 1rem;
                padding-bottom: 1rem;
                align-items: flex-start;
                flex-direction: column;
                gap: .6rem;
            }

            .page-content {
                padding-top: 1.75rem;
            }

            .card-body {
                padding: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="{{ route('visitors.index') }}">
                <span class="brand-mark" aria-hidden="true">VC</span>
                <span>
                    <span class="brand-name">University Visitor Records</span>
                    <span class="brand-caption">VisitorCHED · Records Office</span>
                </span>
            </a>
            <nav class="header-nav" aria-label="Main navigation">
                <a class="nav-link {{ request()->routeIs('visitors.index') ? 'active' : '' }}" href="{{ route('visitors.index') }}">Directory</a>
                <a class="btn btn-primary btn-sm px-3" href="{{ route('visitors.create') }}">Register visitor</a>
            </nav>
        </div>
    </header>

    <main class="page-content">
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm" role="status">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        VisitorCHED <span aria-hidden="true">·</span> University visitor records
    </footer>
</body>
</html>
