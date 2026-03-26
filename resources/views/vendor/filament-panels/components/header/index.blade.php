@props([
    'actions' => [],
    'breadcrumbs' => [],
])

@php
    // These are passed through in the bag otherwise Laravel converts View objects to strings prematurely.
    $heading = $attributes->get('heading');
    $subheading = $attributes->get('subheading');
    $attributes = $attributes->except(['heading', 'subheading']);
@endphp
<body class="body-dashboard ">

<section class="dashboard dashboard--full">
<div class="dashboard-inner">
    <div class="right">
    <h2 class="h2-dashboard">Dashboard</h2>
    <div class="up">
        <div class="graphs">
            <img class="graph" src="imagini/image 22.svg" alt="graph">
            <img class="graph" src="imagini/image 23.svg" alt="graph">
        </div>
    </div>
</div>

</div>
</section>




</body>


