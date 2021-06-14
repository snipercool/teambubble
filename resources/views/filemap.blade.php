@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
@include('components.headerapp')
<div class="app-content">
    @include('components.sidebar')
    <div class="projects-section">
        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <h1>Files</h1>
                </div>
            </div>

            <div class="view-actions">
                <button class="view-btn list-view" title="List View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6" />
                        <line x1="8" y1="12" x2="21" y2="12" />
                        <line x1="8" y1="18" x2="21" y2="18" />
                        <line x1="3" y1="6" x2="3.01" y2="6" />
                        <line x1="3" y1="12" x2="3.01" y2="12" />
                        <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
                </button>
                <button class="view-btn grid-view active" title="Grid View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" /></svg>
                </button>
            </div>
        </div>
        <div class="project-boxe">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="dropzoneForm" class="dropzone" action="{{Request::url()}}/fileupload">
                        @csrf
                    </form>
                    <div align="center">
                        <button type="button" class="btn btn-primary" id="submit-all">Upload</button>
                    </div>
                </div>
            </div>
            <br />
            <div class="panel panel-default" style="overflow: hidden;">
                <div class="panel-body" id="uploaded_image">
                    <div class="project-boxes jsGridView">
                        @if(count($files) >= 0)
                        @foreach($files as $file)
                            @include('components.file')
                        @endforeach
                        @else
                        <div class="noprojects">
                            <img src="{{asset('images/nothing.svg')}}" alt="No projects">
                            <p>{{__('app.nofiles')}}</p>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../js/projectview.js"></script>
    <script type="text/javascript">
        Dropzone.options.dropzoneForm = {
            autoProcessQueue: false,
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg,.pdf,.svg,.docx,.xlsx,.txt",

            init: function () {
                var submitButton = document.querySelector("#submit-all");
                myDropzone = this;

                submitButton.addEventListener('click', function () {
                    myDropzone.processQueue();
                });

                this.on("complete", function () {
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        var _this = this;
                        _this.removeAllFiles();
                    }
                    load_images();
                });

            }

        };

        load_images();

        function load_images() {
            $.ajax({
                url: "{{Request::url()}}/filefetch",
                success: function (data) {
                    return(data);
                }
            })
        }

        $(document).on('click', '.remove_image', function () {
            var name = $(this).attr('id');
            $.ajax({
                url: "{{Request::url()}}/filedelete",
                data: {
                    name: name
                },
                success: function (data) {
                    load_images();
                }
            })
        });

    </script>

</div>
@endsection
