<div class="modal fade" id="opinionsSuggestions" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h3>{{ text('YourOpinionsandSuggestions(PatientandStaff)') }}</h3>
                                <p>{{ text('YourOpinionsandSuggestionsBrief') }}</p>
                            </div>
                            <form action="{{ localeRoute('Suggestion.store') }}" method="POST" class="formWithPhone">
                               
                                @csrf
                                
                                <div class="row">
                                    <div class="mb-3 col-md-12 col-lg-4 col-xl-3">
                                        <label class="form-label">{{text('name')}} <span>*</span></label>
                                        <input type="text" name="first_name" required class="form-control" placeholder="{{text('name')}}" >
                                    </div>
                                    <div class="mb-3 col-md-12 col-lg-4 col-xl-3">
                                        <label class="form-label">{{text('Lastname')}} <span>*</span></label>
                                        <input type="text" required name="last_name" class="form-control" placeholder="{{text('Lastname')}}" >
                                    </div>

                                    <div class="mb-3 col-md-12 col-lg-4 col-xl-3">
                                        <label class="form-label">E-mail <span>*</span></label>
                                        <input type="email" required name="email" class="form-control" placeholder="@email.com" >
                                    </div>

                                    <div class="mb-3 col-md-12 col-lg-4 col-xl-3">
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