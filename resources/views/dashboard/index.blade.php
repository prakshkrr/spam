@extends('layout.master')

@section('content_dashboard_admin_user')
@if (session('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
</div>
@endif
    {{-- ALL SPAM CHECKER CONTENT --}}
    <div class="col-12 col-md-12 white-box-1 px-5 py-4">
        <div class="m-10">    
        <article class="article-container">
            <div class="container text-center">
                <header>
                    <h1>
                        <span class="text-semibold"><i class="icon-plus-circle2"></i>
                            Spam Checker</span>
                    </h1>
                </header>
                <p>
                    Copy/paste an email message to detect and remove spam words</a>.
                </p>
            </div>
            <div class="text-right">
                <!-- Button HTML (to Trigger Modal) -->
                <a href="#import" role="button" class="btn btn-outline-primary" data-bs-toggle="modal">import/Export</a>
                <a href="#sendmail" role="button" class="btn btn-outline-primary" data-bs-toggle="modal">Add suggession</a>
            </div>
            {{-- Main Spam checker content  --}}
            <section class="container mt-4 mb-5">
                <div class="mx-auto shadow-default border-radius-lg" style="border: 1px solid #e6e7eb">
                    <div class="row" style="margin: 0 !important">
                        <div class="col-md-8">
                            <textarea id="spam-check-main-textarea" rows="18" onkeyup="countword()" onpaste="countword()" class="spam-text-area"></textarea>
                        </div>

                        <aside class="col-md-4" style="background-color: #f2f3f5; border-radius: 0 0.5rem 0.5rem 0">
                            <div id="spam-word-checker--right">
                                <table>
                                    <tbody id="spam-content-right">
                                        <tr>
                                            <td>Overall score: <span id="overall" style="color: brown;"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Words: <span id="wordcount" style="color: blue;"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Read time: <span id="readtime" style="color: dodgerblue;"> </span></td>
                                        </tr>
                                    </tbody>

                                    
                                    <span id='spam-content-blank'>Add content to get your spam score. </span>
                                        
                                </table>

                                {{-- Right Side Showing All over scoring and words --}}

                                <div id='right-panel'>
                                </div>
                            
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </article>
    </div>
    {{-- END MAIN CONTENT --}}

      <!-- Modal HTML for import/export data-->
      <div id="import" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import/Export Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
             
                    <div class="container mt-5 text-center">
                      
                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="custom-file text-left">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <input type="file" name="file" class="custom-file-label"/>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary">Import Data</button>
                            <a class="btn btn-outline-success" href="{{ route('export-users') }}">Export Data</a>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal HTML -->

          <!-- Modal HTML for send mail -->
          <div id="sendmail" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enter Your Suggestion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                 
                        <div class="container mt-5 text-center">
                          
                            <div class="container box">
                                @if (count($errors) > 0)
                                 <div class="alert alert-danger">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <ul>
                                   @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                   @endforeach
                                  </ul>
                                 </div>
                                @endif
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <form method="post" action="{{url('sendemail/send')}}">
                                 {{ csrf_field() }}
                                 <div class="form-group text-left">
                                     <label>Enter Your Email</label>
                                     <input type="text" name="email" class="form-control" value="" />
                                 </div>
                                 <div class="form-group text-left">
                                     <label>Enter Your Subject</label>
                                     <input type="text" name="name" class="form-control" value="" />
                                 </div>
                                 <div class="form-group text-left">
                                  <label>Enter Your Message</label>
                                  <textarea name="message" class="form-control"></textarea>
                                 </div>
                                 <div class="form-group ">
                                  <input type="submit" name="send" class="btn btn-outline-info" value="Send" />
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                 </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal HTML -->

    <script type="text/javascript">
        var storeData = [];
        var app = @json($words_json);        
        storeData = JSON.parse(app); 

        $('#spam-content-right').hide();
        $('#spam-content-blank').show();

        var wordArray = [];
        storeData.map((item, index)=>{
            var str = item.wordname;
            var matches = str.match(/(\d+)/);
            let highlight;
            if(matches){
                highlight = item.wordname;
            }else{
                highlight = item.wordname.toLowerCase();
            }
            let finalArr = new RegExp(highlight, 'i');
            let categoryName = item.category.toLowerCase();
            wordArray.push({highlight:finalArr, wordname: item.wordname, category:categoryName, colorcode:item.color});
        });

        let scoreAsHtml;

        $('#spam-check-main-textarea').on('keyup', function(){
            var source = storeData;
            var found=[];
            $('#spam-check-main-textarea').on('keyup', function(){
                found= [];
                var text = $('#spam-check-main-textarea').val().toLowerCase();
                var words = text.split(' ');
                source.map((key, index)=>{
                    var value =  key.wordname.toLowerCase() ;
                    if(text.indexOf(value) > -1){
                        found.push(key);
                    } 
                })
                var unique=[];
                let totalSpamHits = 0;
                found.map((item, index)=>{
                    if(unique.filter(m=>m.category === item.category).length > 0){
                        unique.filter(m=>m.category === item.category)[0].count = found.filter(f=>f.category === item.category).length;
                    }else{
                        unique.push({category: item.category, count:1, colorcode:item.color, image:item.image});
                        totalSpamHits++;
                    }
                });

                var html='<ul>';
                scoreAsHtml = "Great";
                unique.map((item, index)=>{
                    html +=
                        "<li style='border-left: 3px solid " +
                        item.colorcode +
                        "'> <img src=\"/uploads/word/" + item.image + "\" height=\"30px\"/>" +
                        item.category +
                        "<span>(" +
                        item.count +
                        ")</span></li>";
                        
                         // Get All Types Scores
                        let score = totalSpamHits;
                        if (item.category === "Money" || item.category === "Shady") {
                            score += 20;
                        }

                        if (item.category === "Urgency" || item.category === "Overpromise") {
                            score += 10;
                        }
                    scoreAsHtml = score > 20 ? "Poor" : score > 5 ? "Okay" : "Great";
                });
                html += '</ul>';
                $("#right-panel").html(html);
            });
        });
        const textfield = document.getElementById('spam-check-main-textarea');
        const wordcount = document.getElementById('wordcount');
        const readingTimeWord = document.getElementById('readtime');
        const overall = document.getElementById('overall');
        
        function countword(){
            let text = textfield.value;
            text =text.trim();
            const words = text.split(" ");
            const readtime = Math.round(words.length / 200);
            const countTime = readtime ? readtime + " min" : "a few seconds";

            if (words[0] === ""){
                wordcount.innerText = '';
                readingTimeWord.innerText = '';
                overall.innerText = '';
            }else{
                $('#spam-content-blank').hide();
                $('#spam-content-right').show();

                wordcount.innerText = words.length;
                readingTimeWord.innerText = countTime;
                overall.innerText = scoreAsHtml;
            }
        }

    </script>

    <script>
        $('.hwt-backdrop').hide();
    </script>

    <script src="js/highlight_textarea.js"></script>
@endsection
