<div class="doktora-sorun">
    <form action="{{ localeRoute('DoctorQuestion.store') }}" method="POST">
        @csrf
        <div class="content">
        <h4>{{ text('AsktheDoctorFindOut') }}</h4>
            
            <div class="item">
                <label for="exampleInputEmail1" class="form-label">{{ text('userName') }}</label>
                <input type="text" name="user_name" class="form-control" placeholder="{{ text('enterName') }}" required>
            </div>
            <div class="item">
                <label for="exampleInputEmail1" class="form-label">{{ text('email') }}</label>
                <input type="email" name="email" class="form-control" placeholder="@email.com">
            </div>
            <div class="item">
                <label for="exampleInputEmail1" class="form-label">{{ text('Message') }}</label>
                <textarea class="form-control" name="message" id="" required cols="30" rows="5" placeholder="{{ text('Writeindetail') }}"></textarea>
            </div>
            <div class="mb-3 form-check item">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">{!! text('contractAgreement') !!}</label>
            </div>
            <div class="item">
                <button class="btn btn-primary">{{ text('send') }}</button>
            </div>
        </div>
    </form>


</div>