<div class="modal fade" id="pharmacies" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="form-box pb-0">
                    <div class="form-content">
                        <div class="form-mcontent no-bg">
                            <div class="sec-title">

                                <div class="text">
                                    <h3>{{ text('PharmacyonDuty') }} <span class="pink-color"> {{ formatDate($pharma->updated_at) }}</span></h3>
                                </div>
                                @foreach ($pharmacies as $pharmacy)
                                <div @class(["row", "border-bottom" => !$loop->last, "mt-3" => !$loop->first])>
                                    <div class="col-4">
                                        <div class="eczane d-flex">
                                            <img src="{{asset('img/icon/location.png')}}" style="width: 37px;height: fit-content;" alt="">
                                            <div class="text d-block px-2 pb-3">
                                                <h4>{{ $pharmacy->name }}</h4>
                                                <span>{{ $pharmacy->phone }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        {{ $pharmacy->address }} 
                                    </div>
                                    <div class="col-3 location text-center" style="white-space: nowrap;">
                                        <a href="https://www.google.com/maps?q={{ $pharmacy->loc }}" target="_blank">
                                            {{ text('see_on_map') }} <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>