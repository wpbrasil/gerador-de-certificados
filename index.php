<?php

require('config.php');

init();

if (isset($_REQUEST['email']) && $_REQUEST['email']) {

    $email = trim($_REQUEST['email']);

    if (!$infos = get_info_from_email($email))
        $infos = array();

    $first_name = '';
    $images = array();

    foreach ($infos as $info) {

        if (empty($first_name)) {
            $first_name = explode(' ', $info['name']);
            $first_name = utf8_encode($first_name[0]);
        }

        if (!DEBUG && is_file(CACHE_PATH . '/' . $info['file'])) {
            $images[] = CACHE_DIR . '/' . $info['file'];
            continue;
        }

        $info['name'] = strtoupper(remove_accents($info['name']));
        $info['bg_file'] = 'img/bg-' . $info['type'] . '.png';
        $images[] = generate_image($info);

    }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" href="styles.css" />
<meta name="robots" content="noindex,nofollow" />
<style type="text/css">
    .wrap { background-image:url('<?php echo TOP_LOGO; ?>'); }
</style>
</head>
<body>

    <div class="wrap">

        <?php if (!empty($first_name)) : ?>
            <h2>Oi, <?php echo $first_name; ?>!</h2>
        <?php endif; ?>

        <?php if (!empty($images) && is_array($images)) : ?>

            <p>
                Obrigado por participar do WordCamp Curitiba 2012!
                <?php if (count($images) > 1) : ?>
                    Aqui estão seus certificados.
                <?php else : ?>
                    Aqui está seu certificado.
                <?php endif; ?>
            </p>

            <p>
                Qualquer problema, basta entrar em
                 <a href="http://2012.curitiba.wordcamp.org/">contato</a>.
            </p>

            <div class="items">
                <?php foreach ($images as $img) : ?>
                    <div class="item">
                        <a href="<?php echo $img; ?>"><img src="<?php echo $img; ?>" width="250" /></a>
                    </div>
                <?php endforeach; ?>
            </div>

            <p>
                <small>Para salvar, clique com o botão direito e escolha
                "salvar como". Impressão em A4 90DPI.</small>
            </p>

        <?php else : ?>

            <?php if (isset($_REQUEST['email'])) : ?>
                <p>
                    Não foi possível encontrar o seu e-mail. Caso você
                    continue tendo este problema, por favor entre em
                    <a href="http://2012.curitiba.wordcamp.org/">contato</a>
                    conosco informando o seu nome completo, e-mail, e as
                    atividades das quais você participou.
                </p>
            <?php endif; ?>

            <form name="emailinfo" action="" method="GET">
                <p>
                    Digite o e-mail que você cadastrou no formulário
                    de inscrição do evento:
                </p>
                <p><input type="text" name="email" value="" /></p>
                <p><input type="submit" value="Enviar" /></p>
            </form>

        <?php endif; ?>

    </div>

</body>
</html>
