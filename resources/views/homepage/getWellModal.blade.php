<div class="modal fade" id="getWellModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-box pb-0">
                    <div class="form-content">
                        <div class="form-mcontent no-bg">
                            <div class="text d-block">
                                <h3>{{ text('getwellsoon') }}</h3>
                                <p>{{ text('bestWishesBrief') }}</p>
                            </div>
                            <form action="{{ localeRoute('WishingMessage.store') }}" method="POST" class="formWithPhone">
                               
                                @csrf
                                
                                <div class="row">
                                    <div class="mb-3 col-md-12 col-lg-4 col-xl-4">
                                        <label class="form-label">{{text('relativeName')}} <span>*</span></label>
                                        <input type="text" name="patientName" required class="form-control" placeholder="{{text('userName')}}" >
                                    </div>
                                    <div class="mb-3 col-md-12 col-lg-4 col-xl-4">
                                        <label class="form-label">{{text('yourName')}} <span>*</span></label>
                                        <input type="text" required name="senderName" class="form-control" placeholder="{{text('userName')}}" >
                                    </div>

                                    <div class="mb-3 col-md-12 col-lg-4 col-xl-4">
                                        <label class="form-label">{{text('Telephone')}} <span>*</span></label>
                                        <input class="form-control phone-code" required list="datalistOptions" type="text"
                                            placeholder="">
                                        <input type="hidden" name="phone" class="phone-field">
                                    </div>
                                    <div class="mb-3 col-md-12 col-xl-12">
                                        <label class="form-label">{{text('message')}}</label>
                                        <textarea name="message" required id="" cols="30" rows="4" class="form-control"
                                            placeholder="{{text('message')}}"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-12 col-lg-10">
                                            <div class="form-check">
                                                <input class="form-check-input mt-1" required type="checkbox"
                                                    name="flexRadioDefault" id="flexRadioDefault1" required>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    {{text('contractAgreement')}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12 col-lg-2 text-center">
                                            <button class="btn btn-primary ps-5 pe-5">{{text('send')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>