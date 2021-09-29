@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1 bg-secondary bg-opacity-25 p-3">
            <h3 class="text-center">Urls</h3>
            @if(auth()->check())
              <form action="{{ route('urls') }}" method="POST">
                  @csrf
                  @error('url')
                      <div class="alert alert-danger">
                          {{ $message }}
                      </div>
                  @enderror
                  <div class="mb-2">
                      <textarea name="url" id="url" rows="2" class="form-control" placeholder="Insira a url"></textarea>
                  </div>
                  <div class="d-grid gap-2">
                      <button type="submit" class="btn btn-success">Salvar</button>
                  </div>
              </form>
            @endif
            @if ($urls->count())
              <div class="accordion mt-2" id="urlAccordion">
                @foreach ($urls as $url)
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading_{{ $url->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#url_{{ $url->id }}" aria-expanded="false" aria-controls="url_{{ $url->id }}">
                          {{ $url->url }}
                        </button>
                      </h2>
                      <div id="url_{{ $url->id }}" class="accordion-collapse collapse" aria-labelledby="heading_{{ $url->id }}" data-bs-parent="#urlAccordion">
                        <div class="accordion-body">
                          <div>
                            <small class="text-muted"><strong>Cadastrada em:</strong> {{ $url->created_at->diffForHumans() }}</small>
                          </div>
                          <ul>
                            <li>
                              <strong>Status code:</strong>
                              <p>
                                @php 
                                
                                $ch = curl_init($url->url);
                                  
                                // Request method is set
                                curl_setopt($ch, CURLOPT_NOBODY, true);
                                  
                                // Executing cURL session
                                curl_exec($ch);
                                  
                                // Getting information about HTTP Code
                                $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                  
                                // Testing for 404 Error
                                if($retcode != 200) {
                                    echo "Specified URL does not exist";
                                }
                                else {
                                    echo $retcode;
                                }
                                  
                                curl_close($ch);
                                
                                @endphp
                              </p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
            @else
                <p>Não há urls cadastradas.</p>
            @endif
        </div>
    </div>
@endsection