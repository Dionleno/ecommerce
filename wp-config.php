<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'loja_help');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Mve`+/8oHx@;Uz?$dlQa3wn:zCDIAz*vORP4BT8s0A*~]JOo=Gk`,,>:a8)_`a<*');
define('SECURE_AUTH_KEY',  'B,/b SnckfnoX^b>..2`ofoRD-h{nKaX*1yOhYnF:]fp@f%sL;NHe$:u^n,cH[{T');
define('LOGGED_IN_KEY',    'fb=tpuzeD.tYzBt^!0Csi]}GIKENG|H!*vIb1@<w_2?*E<:m5k]WYt2m/xt/S6~<');
define('NONCE_KEY',        '5]%*_M%jvKjqUR|DSf%_@,{f]1`cCYEz}r:|65%FQ|DUDqenpn46K]}X#U^U!rsA');
define('AUTH_SALT',        'An5rFUY=1HG<:%6!(QaxejA1UadXq+x78=!dwJ$H{|&R<a}EO,2<j(I~OEO-FwiE');
define('SECURE_AUTH_SALT', 'oWC;]UJZ2U/eDV(yl{q%/52F:l_+_D<ZPQtu%`(zM),]5&~RgMi^O}]~|DVjAsa~');
define('LOGGED_IN_SALT',   'v*~:3FUb; Ju&5_!1Ych/-Wy}x!fp|0`%n(s4)fC ES}d64g{7:}kmWbGy!Ih!jZ');
define('NONCE_SALT',       'e28`LRo##kqSH,T}/6zoEn&LK-`^G^{n3|k2YlKQ?vD2(Hm*=7:JiY[e2=mFnJ_Y');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
