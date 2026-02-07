<?php
/**
 * Configuração do WordPress para Cloud Run
 */

// Detectar se estamos rodando em HTTPS (Cloud Run termina o SSL no load balancer)
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

define( 'DB_NAME', getenv('DB_NAME') ?: 'gestao_gastos' );
define( 'DB_USER', getenv('DB_USER') ?: 'wp_user_gg' );
define( 'DB_PASSWORD', getenv('DB_PASSWORD') ?: 'Gestao_Gastos_2026!' );
define( 'DB_HOST', getenv('DB_HOST') ?: ':/cloudsql/eco-emissary-240220:southamerica-east1:wp-instance' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// Sais de segurança (Recomenda-se usar Secrets em produção)
define('AUTH_KEY',         getenv('AUTH_KEY')         ?: 'put your unique phrase here');
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY')  ?: 'put your unique phrase here');
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY')    ?: 'put your unique phrase here');
define('NONCE_KEY',        getenv('NONCE_KEY')        ?: 'put your unique phrase here');
define('AUTH_SALT',        getenv('AUTH_SALT')        ?: 'put your unique phrase here');
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: 'put your unique phrase here');
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT')   ?: 'put your unique phrase here');
define('NONCE_SALT',       getenv('NONCE_SALT')       ?: 'put your unique phrase here');

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
