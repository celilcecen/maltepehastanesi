@extends('layout.app')

@section('content')

        <div class="main-section">
            <!-- kvkk-section ==---------------------------- -->
            @include('layout.banner')
            <div class="page-content">
                <div class="container">
                    <div class="page-tree">

                        {{ Breadcrumbs::render('patientGuide') }}

                    </div>

                    <div class="kurumsal-text pb-3">

                        <h3>{!! text('PatientGuideTitle') !!}</h3>

                        <strong>{{ text('PatientGuideBrife') }}</strong> 
                    </div>


                    <div class="accourdion-section">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        @foreach ($patientsGuides as $patientsGuide)
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{ $patientsGuide->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $patientsGuide->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $patientsGuide->id }}">
                                    {{ $patientsGuide->title }}
                                </button>
                                </h2>
                                <div id="flush-collapse{{ $patientsGuide->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $patientsGuide->id }}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {!! $patientsGuide->content !!}
                                </div>
                                </div>
                            </div>

                        @endforeach
                            
                        </div>
                     </div>
                                    </div> 
                                </div>
                                <!-- kvkk-section ==---------------------------- -->
                                </div>

@endsection

@section('schema')

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [

        @foreach($patientsGuides as $index => $patientsGuide)
        {
            "@type": "Question",
            "name": "{{$patientsGuide->title}}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{!!$patientsGuide->content!!}"
              }
            }{{ $index !== count($patientsGuides) - 1 ? ',' : '' }}
        @endforeach

      ]
    }
    </script>


@endsection


