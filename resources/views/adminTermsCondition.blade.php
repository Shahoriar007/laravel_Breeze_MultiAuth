@extends('masterAdmin')
@section('adminUserView')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row">
                                    <h2>Terms & Condition</h2>
                                    <hr>
                                    <form method="POST" action="{{ route('termsConditionPost') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                                
                                                <textarea name="terms" id="terms" cols="70" rows="70" >
                                                @php 
                                                    echo $termsCondition[0]->terms;
                                                @endphp
                                                </textarea>
                                            </div>
                                           
                                            

                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!-- card -->
                </div><!-- .nk-block -->
            </div><!-- .components-preview -->
        </div>
    </div>
</div>

<script>
        CKEDITOR.replace( 'terms' );
</script>

@endsection