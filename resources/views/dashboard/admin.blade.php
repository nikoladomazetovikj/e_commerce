<div class="p-6 text-gray-900 dark:text-white dark:bg-gray-200">
<h1 class="dark:text-red-400">{{ $chart1->options['chart_title'] }}</h1>
{!! $chart1->renderHtml() !!}

<hr>

<h1 class="dark:text-red-400">{{ $chart2->options['chart_title'] }}</h1>
{!! $chart2->renderHtml() !!}

<hr>

<h1 class="dark:text-red-400">{{ $chart3->options['chart_title'] }}</h1>
{!! $chart3->renderHtml() !!}
</div>
