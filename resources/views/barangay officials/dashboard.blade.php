@extends('layouts.brgyofficialslayout')

@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/dashboardstyle.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<div class="container">
    <form method="post" action="{{ route('barangay officials.dashboard') }}">
        @csrf
    <h2>Dashboard</h2>
<div class="row">
    <div class="col-md-3">
        <div class="card card-summary">
            <div class="card-header text-center">Collection </div>
            <div class="card-body"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60" xml:space="preserve" width="64px" height="64px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <rect x="3" y="42.5" style="fill:#7ED09E;" width="10" height="14"></rect> <rect x="18" y="33.5" style="fill:#71C285;" width="10" height="23"></rect> <rect x="33" y="25.5" style="fill:#4FBA6F;" width="10" height="31"></rect> <rect x="48" y="17.5" style="fill:#24AE5F;" width="10" height="39"></rect> <path style="fill:#556080;" d="M59,57.5H1c-0.552,0-1-0.447-1-1s0.448-1,1-1h58c0.552,0,1,0.447,1,1S59.552,57.5,59,57.5z"></path> <path style="fill:#BDC3C7;" d="M8.03,27.83c-0.346,0-0.682-0.179-0.867-0.5c-0.276-0.479-0.112-1.09,0.366-1.366L46.5,3.464 c0.478-0.277,1.089-0.112,1.366,0.366c0.276,0.479,0.112,1.09-0.366,1.366l-38.971,22.5C8.372,27.787,8.199,27.83,8.03,27.83z"></path> <path style="fill:#BDC3C7;" d="M47.001,5.33c-0.032,0-0.064-0.002-0.098-0.005l-8.562-0.83c-0.549-0.053-0.952-0.542-0.898-1.092 c0.053-0.549,0.537-0.954,1.092-0.898l8.562,0.83c0.549,0.053,0.952,0.542,0.898,1.092C47.945,4.943,47.51,5.33,47.001,5.33z"></path> <path style="fill:#BDC3C7;" d="M43.437,13.16c-0.139,0-0.279-0.028-0.414-0.09c-0.503-0.229-0.725-0.821-0.496-1.324l3.562-7.83 c0.229-0.503,0.822-0.727,1.324-0.496c0.503,0.229,0.725,0.821,0.496,1.324l-3.562,7.83C44.181,12.942,43.817,13.16,43.437,13.16z"></path> </g> </g></svg>{{ '₱'.number_format($total_collection, 2, '.', ',') }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-summary">
            <div class="card-header text-center">Deposit </div>
            <div class="card-body"><svg width="64px" height="64px" viewBox="0 -7.5 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>deposit</title> <desc>Created with Sketch.</desc> <defs> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1"> <stop stop-color="#a5a7b1" offset="0%"> </stop> <stop stop-color="#3d3e4d" offset="100%"> </stop> </linearGradient> <linearGradient x1="100%" y1="50%" x2="0%" y2="50%" id="linearGradient-2"> <stop stop-color="#c8cddf" offset="0%"> </stop> <stop stop-color="#AEAFC8" offset="100%"> </stop> </linearGradient> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-3"> <stop stop-color="#1DD47F" offset="0%"> </stop> <stop stop-color="#0DA949" offset="100%"> </stop> </linearGradient> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-4"> <stop stop-color="#7AA0FA" offset="0%"> </stop> <stop stop-color="#4466F3" offset="100%"> </stop> </linearGradient> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-5"> <stop stop-color="#2F6DC8" offset="0%"> </stop> <stop stop-color="#153B97" offset="100%"> </stop> </linearGradient> </defs> <g id="icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ui-gambling-website-lined-icnos-casinoshunter" transform="translate(-2029.000000, -2039.000000)" fill-rule="nonzero"> <g id="4" transform="translate(50.000000, 1871.000000)"> <g id="deposit" transform="translate(1979.000000, 168.000000)"> <path d="M29.4402019,0 C30.9183269,0 32.1165839,1.20419964 32.1165839,2.68965517 L32.1165839,18.8275862 C32.1165839,20.3130417 30.9183269,21.5172414 29.4402019,21.5172414 L2.67638199,21.5172414 C1.19825703,21.5172414 1.42108547e-14,20.3130417 1.42108547e-14,18.8275862 L1.42108547e-14,2.68965517 C1.42108547e-14,1.20419964 1.19825703,0 2.67638199,0 L29.4402019,0 Z" id="Path" fill="url(#linearGradient-1)"> </path> <rect id="Rectangle" fill="url(#linearGradient-2)" x="3.56850933" y="15.2413793" width="6.74051761" height="1.65517241" rx="0.827586207"> </rect> <rect id="Rectangle-Copy-59" fill="url(#linearGradient-2)" x="11.2011543" y="15.2413793" width="6.74051761" height="1.65517241" rx="0.827586207"> </rect> <ellipse id="Oval" fill="#F15314" cx="5.35276399" cy="5.37931034" rx="1.78425466" ry="1.79310345"> </ellipse> <ellipse id="Oval-Copy-21" fill="#F59D00" cx="8.02914598" cy="5.37931034" rx="1.78425466" ry="1.79310345"> </ellipse> <path d="M32.1961474,3.80818423 C32.1961474,2.95430816 32.9399074,2.26210483 33.8573818,2.26210483 C34.1773631,2.26210483 34.4905356,2.34811087 34.7592563,2.50978508 L40.4999061,5.96361337 C41.2704021,6.42717776 41.4912295,7.38428405 40.993138,8.1013701 C40.8654862,8.28514613 40.6973702,8.44160861 40.4999061,8.56041168 L34.7592563,12.01424 C33.9887603,12.4778044 32.9603669,12.2722844 32.4622754,11.5551984 C32.2885594,11.3051052 32.1961474,11.0136414 32.1961476,10.7163908 L32.1959606,10.4717636 L22.9206986,10.472086 C22.0032243,10.472086 21.2594643,9.77988268 21.2594643,8.92600661 L21.2594643,5.59801844 C21.2594643,4.74414236 22.0032243,4.05193904 22.9206722,4.05193904 L32.1959611,4.0516646 L32.1961474,3.80818423 Z" id="Path" fill="url(#linearGradient-3)"> </path> <g id="chip-copy-7" transform="translate(21.000000, 13.000000)"> <path d="M7,0 C10.8659932,0 14,3.13400675 14,7 C14,10.8659932 10.8659932,14 7,14 C3.13400675,14 0,10.8659932 0,7 C0,3.13400675 3.13400675,0 7,0 Z" id="chip" fill="url(#linearGradient-4)"> </path> <path d="M7,0 C10.8659932,0 14,3.13400675 14,7 C14,10.8659932 10.8659932,14 7,14 C3.13400675,14 0,10.8659932 0,7 C0,3.13400675 3.13400675,0 7,0 Z M4.43853849,9.92622304 L4.41931818,9.95002806 L4.41931818,9.95002806 L2.78881632,11.5806555 C3.80791151,12.5180385 5.14064605,13.1197128 6.61164099,13.2102997 L6.61134556,10.8697107 C5.78307575,10.7875255 5.03124461,10.4454675 4.43853849,9.92622304 Z M7.38865444,10.8697107 L7.38835901,13.2102997 C8.91530999,13.116267 10.2932818,12.471524 11.3261104,11.4722349 C11.3019681,11.4583579 11.2792023,11.4402854 11.2582351,11.4193182 L9.66855872,9.82883918 C9.06056564,10.4025916 8.2676545,10.7824918 7.38865444,10.8697107 Z M3.13009215,7.38666211 L3.11111111,7.38888889 L3.11111111,7.38888889 L0.78970034,7.38835901 C0.874698876,8.76860855 1.40967218,10.02713 2.24973747,11.0190407 L3.86934624,9.40005612 L3.91287599,9.36530366 C3.48374323,8.80605343 3.20315359,8.12684456 3.13009215,7.38666211 Z M10.1792379,9.2401802 L11.8082071,10.8693462 L11.8413327,10.9089852 C12.6289122,9.93477714 13.1284143,8.71805532 13.2102997,7.38835901 L10.8888889,7.38888889 L10.8699078,7.38666211 C10.8022117,8.07248905 10.556348,8.70596882 10.1792379,9.2401802 Z M7,3.88888889 C5.28178078,3.88888889 3.88888889,5.28178078 3.88888889,7 C3.88888889,8.71821922 5.28178078,10.1111111 7,10.1111111 C8.71821922,10.1111111 10.1111111,8.71821922 10.1111111,7 C10.1111111,5.28178078 8.71821922,3.88888889 7,3.88888889 Z M0.78970034,6.61164099 L3.11111111,6.61111111 L3.13009215,6.61333789 C3.20315359,5.87315544 3.48374323,5.19394657 3.91287599,4.63469634 L3.86934624,4.59994388 L2.24973747,2.9809593 C1.40967218,3.97286995 0.874698876,5.23139145 0.78970034,6.61164099 Z M11.6791825,2.8984969 L10.024176,4.55483602 C10.488784,5.128748 10.7933322,5.83755281 10.8699078,6.61333789 L10.8888889,6.61111111 L10.8888889,6.61111111 L13.2102997,6.61164099 C13.1229278,5.19285177 12.5601017,3.90268335 11.6791825,2.8984969 Z M2.78881632,2.41934447 L4.41931818,4.04997194 C4.42709843,4.05775219 4.43448011,4.06578009 4.4414632,4.07403026 C5.03171981,3.55411618 5.78428141,3.21192611 6.61333789,3.13009215 C6.61127253,3.1241528 6.61111111,3.11765081 6.61111111,3.11111111 L6.61164099,0.78970034 C5.14064605,0.880287159 3.80791151,1.48196152 2.78881632,2.41934447 Z M7.38835901,0.78970034 L7.38888889,3.11111111 L7.38666211,3.13009215 C8.17674506,3.20807914 8.89735606,3.52251918 9.47675802,4.00167517 L11.1313569,2.34717519 C10.1229473,1.45113198 8.82124811,0.877940525 7.38835901,0.78970034 Z" id="chip" fill="url(#linearGradient-5)"> </path> </g> </g> </g> </g> </g> </g></svg>{{ '₱'.number_format( $total_deposit, 2, '.', ',') }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-summary">
            <div class="card-header text-center">Expense</div>
            <div class="card-body"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M765.217 609.391C765.217 803.032 608.25 960 414.61 960 220.969 960 64 803.032 64 609.391c0-193.64 156.969-350.608 350.61-350.608v350.608h350.607z" fill="#0DB14B"></path><path d="M960 531.477C960 273.279 750.723 64 492.523 64v467.477H960z" fill="#f31d12"></path><path d="M378.77 609.392h35.84v-350.61c-12.099 0-24.056 0.683-35.84 2.016v348.594zM727.569 609.391C709.619 786.195 560.311 924.16 378.77 924.16c-87.694 0-167.666-32.413-229.145-85.625C213.914 912.809 308.662 960 414.61 960c193.64 0 350.609-156.969 350.609-350.609h-37.65zM804.64 183.52c74.288 82.762 119.52 192.138 119.52 312.117H492.523v35.84H960c0-138.219-60.014-262.375-155.36-347.957z" fill=""></path></g></svg>{{ '₱'.number_format($total_expense, 2, '.', ',')  }}</div>
        </div>
    </div>
<div class="col-md-3">
        <div class="card card-summary">
            <div class="card-header text-center">Withdraw</div>
            <div class="card-body"><svg width="64px" height="64px" viewBox="0 -7.5 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>deposit</title> <desc>Created with Sketch.</desc> <defs> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1"> <stop stop-color="#aeb1c1" offset="0%"> </stop> <stop stop-color="#494b69" offset="100%"> </stop> </linearGradient> <linearGradient x1="100%" y1="50%" x2="0%" y2="50%" id="linearGradient-2"> <stop stop-color="#C3C4D4" offset="0%"> </stop> <stop stop-color="#AEAFC8" offset="100%"> </stop> </linearGradient> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-3"> <stop stop-color="#1DD47F" offset="0%"> </stop> <stop stop-color="#0DA949" offset="100%"> </stop> </linearGradient> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-4"> <stop stop-color="#7AA0FA" offset="0%"> </stop> <stop stop-color="#4466F3" offset="100%"> </stop> </linearGradient> <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-5"> <stop stop-color="#2F6DC8" offset="0%"> </stop> <stop stop-color="#153B97" offset="100%"> </stop> </linearGradient> </defs> <g id="icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ui-gambling-website-lined-icnos-casinoshunter" transform="translate(-2029.000000, -2039.000000)" fill-rule="nonzero"> <g id="4" transform="translate(50.000000, 1871.000000)"> <g id="deposit" transform="translate(1979.000000, 168.000000)"> <path d="M29.4402019,0 C30.9183269,0 32.1165839,1.20419964 32.1165839,2.68965517 L32.1165839,18.8275862 C32.1165839,20.3130417 30.9183269,21.5172414 29.4402019,21.5172414 L2.67638199,21.5172414 C1.19825703,21.5172414 1.42108547e-14,20.3130417 1.42108547e-14,18.8275862 L1.42108547e-14,2.68965517 C1.42108547e-14,1.20419964 1.19825703,0 2.67638199,0 L29.4402019,0 Z" id="Path" fill="url(#linearGradient-1)"> </path> <rect id="Rectangle" fill="url(#linearGradient-2)" x="3.56850933" y="15.2413793" width="6.74051761" height="1.65517241" rx="0.827586207"> </rect> <rect id="Rectangle-Copy-59" fill="url(#linearGradient-2)" x="11.2011543" y="15.2413793" width="6.74051761" height="1.65517241" rx="0.827586207"> </rect> <ellipse id="Oval" fill="#F15314" cx="5.35276399" cy="5.37931034" rx="1.78425466" ry="1.79310345"> </ellipse> <ellipse id="Oval-Copy-21" fill="#F59D00" cx="8.02914598" cy="5.37931034" rx="1.78425466" ry="1.79310345"> </ellipse> <path d="M32.1961474,3.80818423 C32.1961474,2.95430816 32.9399074,2.26210483 33.8573818,2.26210483 C34.1773631,2.26210483 34.4905356,2.34811087 34.7592563,2.50978508 L40.4999061,5.96361337 C41.2704021,6.42717776 41.4912295,7.38428405 40.993138,8.1013701 C40.8654862,8.28514613 40.6973702,8.44160861 40.4999061,8.56041168 L34.7592563,12.01424 C33.9887603,12.4778044 32.9603669,12.2722844 32.4622754,11.5551984 C32.2885594,11.3051052 32.1961474,11.0136414 32.1961476,10.7163908 L32.1959606,10.4717636 L22.9206986,10.472086 C22.0032243,10.472086 21.2594643,9.77988268 21.2594643,8.92600661 L21.2594643,5.59801844 C21.2594643,4.74414236 22.0032243,4.05193904 22.9206722,4.05193904 L32.1959611,4.0516646 L32.1961474,3.80818423 Z" id="Path" fill="url(#linearGradient-3)"> </path> <g id="chip-copy-7" transform="translate(21.000000, 13.000000)"> <path d="M7,0 C10.8659932,0 14,3.13400675 14,7 C14,10.8659932 10.8659932,14 7,14 C3.13400675,14 0,10.8659932 0,7 C0,3.13400675 3.13400675,0 7,0 Z" id="chip" fill="url(#linearGradient-4)"> </path> <path d="M7,0 C10.8659932,0 14,3.13400675 14,7 C14,10.8659932 10.8659932,14 7,14 C3.13400675,14 0,10.8659932 0,7 C0,3.13400675 3.13400675,0 7,0 Z M4.43853849,9.92622304 L4.41931818,9.95002806 L4.41931818,9.95002806 L2.78881632,11.5806555 C3.80791151,12.5180385 5.14064605,13.1197128 6.61164099,13.2102997 L6.61134556,10.8697107 C5.78307575,10.7875255 5.03124461,10.4454675 4.43853849,9.92622304 Z M7.38865444,10.8697107 L7.38835901,13.2102997 C8.91530999,13.116267 10.2932818,12.471524 11.3261104,11.4722349 C11.3019681,11.4583579 11.2792023,11.4402854 11.2582351,11.4193182 L9.66855872,9.82883918 C9.06056564,10.4025916 8.2676545,10.7824918 7.38865444,10.8697107 Z M3.13009215,7.38666211 L3.11111111,7.38888889 L3.11111111,7.38888889 L0.78970034,7.38835901 C0.874698876,8.76860855 1.40967218,10.02713 2.24973747,11.0190407 L3.86934624,9.40005612 L3.91287599,9.36530366 C3.48374323,8.80605343 3.20315359,8.12684456 3.13009215,7.38666211 Z M10.1792379,9.2401802 L11.8082071,10.8693462 L11.8413327,10.9089852 C12.6289122,9.93477714 13.1284143,8.71805532 13.2102997,7.38835901 L10.8888889,7.38888889 L10.8699078,7.38666211 C10.8022117,8.07248905 10.556348,8.70596882 10.1792379,9.2401802 Z M7,3.88888889 C5.28178078,3.88888889 3.88888889,5.28178078 3.88888889,7 C3.88888889,8.71821922 5.28178078,10.1111111 7,10.1111111 C8.71821922,10.1111111 10.1111111,8.71821922 10.1111111,7 C10.1111111,5.28178078 8.71821922,3.88888889 7,3.88888889 Z M0.78970034,6.61164099 L3.11111111,6.61111111 L3.13009215,6.61333789 C3.20315359,5.87315544 3.48374323,5.19394657 3.91287599,4.63469634 L3.86934624,4.59994388 L2.24973747,2.9809593 C1.40967218,3.97286995 0.874698876,5.23139145 0.78970034,6.61164099 Z M11.6791825,2.8984969 L10.024176,4.55483602 C10.488784,5.128748 10.7933322,5.83755281 10.8699078,6.61333789 L10.8888889,6.61111111 L10.8888889,6.61111111 L13.2102997,6.61164099 C13.1229278,5.19285177 12.5601017,3.90268335 11.6791825,2.8984969 Z M2.78881632,2.41934447 L4.41931818,4.04997194 C4.42709843,4.05775219 4.43448011,4.06578009 4.4414632,4.07403026 C5.03171981,3.55411618 5.78428141,3.21192611 6.61333789,3.13009215 C6.61127253,3.1241528 6.61111111,3.11765081 6.61111111,3.11111111 L6.61164099,0.78970034 C5.14064605,0.880287159 3.80791151,1.48196152 2.78881632,2.41934447 Z M7.38835901,0.78970034 L7.38888889,3.11111111 L7.38666211,3.13009215 C8.17674506,3.20807914 8.89735606,3.52251918 9.47675802,4.00167517 L11.1313569,2.34717519 C10.1229473,1.45113198 8.82124811,0.877940525 7.38835901,0.78970034 Z" id="chip" fill="url(#linearGradient-5)"> </path> </g> </g> </g> </g> </g> </g></svg>{{'₱'.number_format( $total_withdraw, 2, '.', ',')}}</div>
        </div>
    </div>
</div>




<div style="display:flex; justify-content:space-between; align-items:flex-start;">
  <div>
    <input type="date" id="startDate">
    <input type="date" id="endDate">
  </div>
  <button onclick="filterData()">Filter</button>
</div>
<div>
  <canvas id="myChart"></canvas>
</div>


<script>
var ctx = document.getElementById('myChart').getContext('2d');

// Define initial data
var data = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  datasets: [
    {
      label: 'Collection',
      borderColor: 'blue',
      backgroundColor: 'rgba(0, 0, 255, 0.1)',
      data: [10000, 15000, 20000, 25000, 30000, 35000, 30000, 35000, 50000, 55000, 60000, 65000],
      tension: 0.3,
      fill: true
    },
    {
      label: 'Deposit',
      borderColor: 'green',
      backgroundColor: 'rgba(0, 255, 0, 0.1)',
      data: [8000, 12000, 16000, 20000, 23000, 28000, 32000, 36000, 30000, 3000, 38000, 52000],
      tension: 0.3,
      fill: true
    },
    {
      label: 'Expense',
      borderColor: 'red',
      backgroundColor: 'rgba(255, 0, 0, 0.1)',
      data: [5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000, 13000, 13000, 15000, 16000],
      tension: 0.3,
      fill: true
    },
    {
      label: 'Withdraw',
      borderColor: 'purple',
      backgroundColor: 'rgba(128, 0, 128, 0.1)',
      data: [2000, 4000, 6000, 8000, 10000, 12000, 14000, 16000, 18000, 20000, 22000, 24000],
      tension: 0.3,
      fill: true
    }
  ]
};


// Create chart
var myChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: {
    plugins: {
      legend: {
        position: 'bottom'
      }
    }
  }
});

function filterData() {
  var startDate = document.getElementById('startDate').value;
  var endDate = document.getElementById('endDate').value;

  // Convert dates to timestamp
  var startTimestamp = new Date(startDate).getTime();
  var endTimestamp = new Date(endDate).getTime();

  // Get selected year
  var startYear = new Date(startDate).getFullYear();

  // Initialize total amounts to zero
  var totalCollection = 0;
  var totalDeposit = 0;
  var totalExpense = 0;
  var totalWithdraw = 0;

  // Filter datasets based on date range
  myChart.data.datasets.forEach(function(dataset) {
    var filteredData = [];

    dataset.data.forEach(function(dataPoint, index) {
      var label = myChart.data.labels[index];
      var year = new Date('2023 ' + label).getFullYear();

      if (year === startYear && startTimestamp <= endTimestamp) {
        filteredData.push(dataPoint);

        // Update total amounts based on dataset
        switch(dataset.label) {
          case 'Collection':
            totalCollection += dataPoint;
            break;
          case 'Deposit':
            totalDeposit += dataPoint;
            break;
          case 'Expense':
            totalExpense += dataPoint;
            break;
          case 'Withdraw':
            totalWithdraw += dataPoint;
            break;
        }
      } else {
        filteredData.push(null);
      }
    });

    dataset.data = filteredData;
  });

  // Update total amounts in summary cards
  document.getElementById('totalCollection').innerHTML = '₱' + number_format(totalCollection, 2, '.', ',');
  document.getElementById('totalDeposit').innerHTML = '₱' + number_format(totalDeposit, 2, '.', ',');
  document.getElementById('totalExpense').innerHTML = '₱' + number_format(totalExpense, 2, '.', ',');
  document.getElementById('totalWithdraw').innerHTML = '₱' + number_format(totalWithdraw, 2, '.', ',');

  // Update chart labels
  var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  var labels = [];

  for (var i = 0; i < monthNames.length; i++) {
    labels.push(monthNames[i] + ' ' + startYear);
  }

  updateLabels(labels);

  // Update chart
  myChart.update();
}


</script>


    <h2>Transactions</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>₱{{ number_format($transaction->amount, 2, '.', ',') }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    </form>
</div>
</body>
</html>
@endsection


