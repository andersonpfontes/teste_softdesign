<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Olá, <?= session()->get('firstname') ?></h1>
    </div>
  </div>
    <hr>
    <div class="row">
        <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-primary">
                <div class="card-body bg-primary text-white">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1>10</h1>
                            <h4>Livros</h4>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('/books'); ?>" target="_self">
                    <div class="card-footer bg-light text-primary">
                        <span class="float-left">Mais detalhes</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-5 col-md-6" style="margin-top: 20px">
            <div class="card border-secondary">
                <div class="card-body bg-secondary text-white">
                    <div class="row">
                        <div class="col-3">
                            <img src="<?php echo base_url().'/assets/imagens/'.$clima->img_id; ?>.png" style="height: 100%;" class="imagem-do-tempo">
                        </div>
                        <div class="col-9 text-right">
                            <h4><?php echo $clima->city; ?> <?php echo $clima->temp; ?> ºC</h4>
                            <h4><?php echo $clima->description; ?></h4>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-light text-secondary">
                        <span class="float-left">
                            Nascer do Sol: <?php echo $clima->sunrise; ?> - Pôr do Sol: <?php echo $clima->sunset; ?><br>
                            Velocidade do vento: <?php echo $clima->wind_speedy; ?><br>
                        </span>
                        <div class="clearfix"></div>
                    </div>
            </div>
        </div>
    </div>
</div>