@extends('layouts/admin')

@section('title', 'Dashboard - Analytics')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endpush
@push('scripts')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Empresas</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ \App\Models\Empresa::count() }}</h4>
              </div>
              <small>Registrados en el sistema</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-dark rounded p-2">
                <span class="iconify  tf-icons bx-sm" data-icon="mdi:building"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Agencias</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ \App\Models\Agencia::count() }}</h4>
              </div>
              <small>Registrados en el sistema</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-warning rounded p-2">
                <span class="iconify  tf-icons bx-sm" data-icon="ps:store"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Roles</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ \App\Models\Role::count() }}</h4>
              </div>
              <small>Registrados en el sistema</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <span class="iconify  tf-icons bx-sm" data-icon="mdi:lock"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Permisos</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ \App\Models\Permission::count() }}</h4>
              </div>
              <small>Registrados en el sistema</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-danger rounded p-2">
                <span class="iconify  tf-icons bx-sm" data-icon="mdi:shield-outline"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-statistics">
            <div class="card-header">
                <span class="card-title">
                    Últimos movimientos en el sistema
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                           <tr class="text-center">
                            <th>User</th>
                            <th>Descripcion</th>
                            <th>Fecha Registro</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($logs->take(5) as $row)
                           <tr class="text-center">
                            <td>{{ $row->user->name }}</td>
								<td>
                                    @if(strlen($row->descripcion) > 30)
										{{ substr($row->descripcion, 0, 30) . "..."}}
									@else
										{{ $row->descripcion }}
									@endif
                                </td>
								<td>{{ $row->fecha_registro }}</td>
                        </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-statistics">
            <div class="card-header">
                <span class="card-title">
                    Últimos usuarios registrados
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                           <tr class="text-center">
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Estado</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($users->take(5) as $item)
                           <tr class="text-center">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                             @if ($item->status == 1)
                                <span class="badge bg-label-success">
                                    ACTIVO
                                </span>
                               @else
                              <span class="badge bg-label-danger">
                                    INACTIVO
                                </span>
                             @endif
                            </td>
                        </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-12 mb-4 mt-3">
        <div class="card">
          <div class="card-header header-elements">
            <h5 class="card-title mb-0">Estadísticas de inicio de sesión en el año en curso</h5>

          </div>
          <div class="card-body">
            <canvas id="barChart" class="chartjs" data-height="350"></canvas>
          </div>
        </div>
      </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/vendor/libs/chartjs/chartjs.js') }}"></script>
<script>
"use strict";
!function() {
    var o = "#836AF9"
      , r = "#ffe800"
      , t = "#28dac6"
      , e = "#EDF1F4"
      , a = "#2B9AFF"
      , l = "#84D0FF";
    let i, n, d, s, c;
    s = (isDarkStyle ? (i = config.colors_dark.cardColor,
    n = config.colors_dark.headingColor,
    d = config.colors_dark.textMuted,
    c = config.colors_dark.bodyColor,
    config.colors_dark) : (i = config.colors.cardColor,
    n = config.colors.headingColor,
    d = config.colors.textMuted,
    c = config.colors.bodyColor,
    config.colors)).borderColor;
    document.querySelectorAll(".chartjs").forEach(function(o) {
        o.height = o.dataset.height
    });
    var p = document.getElementById("barChart")
      , p = (p && new Chart(p,{
        type: "bar",
        data: {
            labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            datasets: [{
                data: [
                       {{ $logins1 }},
                       {{ $logins2 }},
                       {{ $logins3 }},
                       {{ $logins4 }},
                       {{ $logins5 }},
                       {{ $logins6 }},
                       {{ $logins7 }},
                       {{ $logins8 }},
                       {{ $logins9 }},
                       {{ $logins10 }},
                       {{ $logins11 }},
                       {{ $logins12 }},],
                backgroundColor: t,
                borderColor: "transparent",
                maxBarThickness: 15,
                borderRadius: {
                    topRight: 15,
                    topLeft: 15
                }
            }]
        },
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            animation: {
                duration: 500
            },
            plugins: {
                tooltip: {
                    rtl: isRtl,
                    backgroundColor: i,
                    titleColor: n,
                    bodyColor: c,
                    borderWidth: 1,
                    borderColor: s
                },
                legend: {
                    display: !1
                }
            },
            scales: {
                x: {
                    grid: {
                        color: s,
                        drawBorder: !1,
                        borderColor: s
                    },
                    ticks: {
                        color: d
                    }
                },
                y: {
                    min: 0,
                    max: 600,
                    grid: {
                        color: s,
                        drawBorder: !1,
                        borderColor: s
                    },
                    ticks: {
                        stepSize: 100,
                        color: d
                    }
                }
            }
        }
    }),

    document.getElementById("scatterChart"));

}();

</script>
@endpush
