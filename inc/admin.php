<?php

/**
 * Load functions for the Lerp panel menu.
 */
if ( is_admin() ) {
    require_once 'admin-pages/lerp-panel-functions.php';
    require_once 'admin-pages/support.php';
}


function lerp_welcome_page()
{
    require_once 'admin-pages/welcome.php';
}

function lerp_admin_menu()
{
    if ( current_user_can('edit_theme_options') ) {
        add_menu_page('Lerp主题设置',
            'Lerp主题设置',
            'administrator',
            'lerp-system-status',
            'lerp_welcome_page',
            'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjAwIDIwMCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjAwIDIwMCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGcgaWQ9Imljb21vb24taWdub3JlIiBkaXNwbGF5PSJub25lIj48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxNS4xIiB5MT0iLTQxMiIgeDI9IjQxNS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDE4LjIiIHkxPSItNDEyIiB4Mj0iNDE4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MjEuNCIgeTE9Ii00MTIiIHgyPSI0MjEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQyNC41IiB5MT0iLTQxMiIgeDI9IjQyNC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDI3LjYiIHkxPSItNDEyIiB4Mj0iNDI3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MzAuOCIgeTE9Ii00MTIiIHgyPSI0MzAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQzMy45IiB5MT0iLTQxMiIgeDI9IjQzMy45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDM3IiB5MT0iLTQxMiIgeDI9IjQzNyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ0MC4xIiB5MT0iLTQxMiIgeDI9IjQ0MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDQzLjIiIHkxPSItNDEyIiB4Mj0iNDQzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0NDYuNCIgeTE9Ii00MTIiIHgyPSI0NDYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQ0OS41IiB5MT0iLTQxMiIgeDI9IjQ0OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDUyLjYiIHkxPSItNDEyIiB4Mj0iNDUyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0NTUuOCIgeTE9Ii00MTIiIHgyPSI0NTUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ1OC45IiB5MT0iLTQxMiIgeDI9IjQ1OC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDYyIiB5MT0iLTQxMiIgeDI9IjQ2MiIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ2NS4xIiB5MT0iLTQxMiIgeDI9IjQ2NS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDY4LjIiIHkxPSItNDEyIiB4Mj0iNDY4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0NzEuNCIgeTE9Ii00MTIiIHgyPSI0NzEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQ3NC41IiB5MT0iLTQxMiIgeDI9IjQ3NC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDc3LjYiIHkxPSItNDEyIiB4Mj0iNDc3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0ODAuOCIgeTE9Ii00MTIiIHgyPSI0ODAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ4My45IiB5MT0iLTQxMiIgeDI9IjQ4My45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDg3IiB5MT0iLTQxMiIgeDI9IjQ4NyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQ5MC4xIiB5MT0iLTQxMiIgeDI9IjQ5MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDkzLjIiIHkxPSItNDEyIiB4Mj0iNDkzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0OTYuNCIgeTE9Ii00MTIiIHgyPSI0OTYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQ5OS41IiB5MT0iLTQxMiIgeDI9IjQ5OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTAyLjYiIHkxPSItNDEyIiB4Mj0iNTAyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1MDUuOCIgeTE9Ii00MTIiIHgyPSI1MDUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjUwOC45IiB5MT0iLTQxMiIgeDI9IjUwOC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTEyIiB5MT0iLTQxMiIgeDI9IjUxMiIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjUxNS4xIiB5MT0iLTQxMiIgeDI9IjUxNS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTE4LjIiIHkxPSItNDEyIiB4Mj0iNTE4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1MjEuNCIgeTE9Ii00MTIiIHgyPSI1MjEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjUyNC41IiB5MT0iLTQxMiIgeDI9IjUyNC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTI3LjYiIHkxPSItNDEyIiB4Mj0iNTI3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1MzAuOCIgeTE9Ii00MTIiIHgyPSI1MzAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjUzMy45IiB5MT0iLTQxMiIgeDI9IjUzMy45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTM3IiB5MT0iLTQxMiIgeDI9IjUzNyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU0MC4xIiB5MT0iLTQxMiIgeDI9IjU0MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTQzLjIiIHkxPSItNDEyIiB4Mj0iNTQzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1NDYuNCIgeTE9Ii00MTIiIHgyPSI1NDYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjU0OS41IiB5MT0iLTQxMiIgeDI9IjU0OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTUyLjYiIHkxPSItNDEyIiB4Mj0iNTUyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1NTUuOCIgeTE9Ii00MTIiIHgyPSI1NTUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU1OC45IiB5MT0iLTQxMiIgeDI9IjU1OC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTYyIiB5MT0iLTQxMiIgeDI9IjU2MiIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU2NS4xIiB5MT0iLTQxMiIgeDI9IjU2NS4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTY4LjIiIHkxPSItNDEyIiB4Mj0iNTY4LjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1NzEuNCIgeTE9Ii00MTIiIHgyPSI1NzEuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjU3NC41IiB5MT0iLTQxMiIgeDI9IjU3NC41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNTc3LjYiIHkxPSItNDEyIiB4Mj0iNTc3LjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI1ODAuOCIgeTE9Ii00MTIiIHgyPSI1ODAuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU4My45IiB5MT0iLTQxMiIgeDI9IjU4My45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTg3IiB5MT0iLTQxMiIgeDI9IjU4NyIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjU5MC4xIiB5MT0iLTQxMiIgeDI9IjU5MC4xIiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNTkzLjIiIHkxPSItNDEyIiB4Mj0iNTkzLjIiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI1OTYuNCIgeTE9Ii00MTIiIHgyPSI1OTYuNCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjU5OS41IiB5MT0iLTQxMiIgeDI9IjU5OS41IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNjAyLjYiIHkxPSItNDEyIiB4Mj0iNjAyLjYiIHkyPSItMjEyIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI2MDUuOCIgeTE9Ii00MTIiIHgyPSI2MDUuOCIgeTI9Ii0yMTIiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjYwOC45IiB5MT0iLTQxMiIgeDI9IjYwOC45IiB5Mj0iLTIxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTQwOC45IiB4Mj0iNjEyIiB5Mj0iLTQwOC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItNDA1LjgiIHgyPSI2MTIiIHkyPSItNDA1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii00MDIuNiIgeDI9IjYxMiIgeTI9Ii00MDIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTM5OS41IiB4Mj0iNjEyIiB5Mj0iLTM5OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzk2LjQiIHgyPSI2MTIiIHkyPSItMzk2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zOTMuMiIgeDI9IjYxMiIgeTI9Ii0zOTMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM5MC4xIiB4Mj0iNjEyIiB5Mj0iLTM5MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzg3IiB4Mj0iNjEyIiB5Mj0iLTM4NyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM4My45IiB4Mj0iNjEyIiB5Mj0iLTM4My45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzgwLjgiIHgyPSI2MTIiIHkyPSItMzgwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zNzcuNiIgeDI9IjYxMiIgeTI9Ii0zNzcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTM3NC41IiB4Mj0iNjEyIiB5Mj0iLTM3NC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzcxLjQiIHgyPSI2MTIiIHkyPSItMzcxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zNjguMiIgeDI9IjYxMiIgeTI9Ii0zNjguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM2NS4xIiB4Mj0iNjEyIiB5Mj0iLTM2NS4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzYyIiB4Mj0iNjEyIiB5Mj0iLTM2MiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM1OC45IiB4Mj0iNjEyIiB5Mj0iLTM1OC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzU1LjgiIHgyPSI2MTIiIHkyPSItMzU1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zNTIuNiIgeDI9IjYxMiIgeTI9Ii0zNTIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTM0OS41IiB4Mj0iNjEyIiB5Mj0iLTM0OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzQ2LjQiIHgyPSI2MTIiIHkyPSItMzQ2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zNDMuMiIgeDI9IjYxMiIgeTI9Ii0zNDMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTM0MC4xIiB4Mj0iNjEyIiB5Mj0iLTM0MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzM3IiB4Mj0iNjEyIiB5Mj0iLTMzNyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTMzMy45IiB4Mj0iNjEyIiB5Mj0iLTMzMy45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzMwLjgiIHgyPSI2MTIiIHkyPSItMzMwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zMjcuNiIgeDI9IjYxMiIgeTI9Ii0zMjcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTMyNC41IiB4Mj0iNjEyIiB5Mj0iLTMyNC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMzIxLjQiIHgyPSI2MTIiIHkyPSItMzIxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0zMTguMiIgeDI9IjYxMiIgeTI9Ii0zMTguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTMxNS4xIiB4Mj0iNjEyIiB5Mj0iLTMxNS4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzEyIiB4Mj0iNjEyIiB5Mj0iLTMxMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTMwOC45IiB4Mj0iNjEyIiB5Mj0iLTMwOC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMzA1LjgiIHgyPSI2MTIiIHkyPSItMzA1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0zMDIuNiIgeDI9IjYxMiIgeTI9Ii0zMDIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTI5OS41IiB4Mj0iNjEyIiB5Mj0iLTI5OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjk2LjQiIHgyPSI2MTIiIHkyPSItMjk2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yOTMuMiIgeDI9IjYxMiIgeTI9Ii0yOTMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI5MC4xIiB4Mj0iNjEyIiB5Mj0iLTI5MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjg3IiB4Mj0iNjEyIiB5Mj0iLTI4NyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI4My45IiB4Mj0iNjEyIiB5Mj0iLTI4My45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjgwLjgiIHgyPSI2MTIiIHkyPSItMjgwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0yNzcuNiIgeDI9IjYxMiIgeTI9Ii0yNzcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTI3NC41IiB4Mj0iNjEyIiB5Mj0iLTI3NC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjcxLjQiIHgyPSI2MTIiIHkyPSItMjcxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yNjguMiIgeDI9IjYxMiIgeTI9Ii0yNjguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI2NS4xIiB4Mj0iNjEyIiB5Mj0iLTI2NS4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjYyIiB4Mj0iNjEyIiB5Mj0iLTI2MiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI1OC45IiB4Mj0iNjEyIiB5Mj0iLTI1OC45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjU1LjgiIHgyPSI2MTIiIHkyPSItMjU1LjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0yNTIuNiIgeDI9IjYxMiIgeTI9Ii0yNTIuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTI0OS41IiB4Mj0iNjEyIiB5Mj0iLTI0OS41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjQ2LjQiIHgyPSI2MTIiIHkyPSItMjQ2LjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yNDMuMiIgeDI9IjYxMiIgeTI9Ii0yNDMuMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTI0MC4xIiB4Mj0iNjEyIiB5Mj0iLTI0MC4xIi8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjM3IiB4Mj0iNjEyIiB5Mj0iLTIzNyIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTIzMy45IiB4Mj0iNjEyIiB5Mj0iLTIzMy45Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIHgxPSI0MTIiIHkxPSItMjMwLjgiIHgyPSI2MTIiIHkyPSItMjMwLjgiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIG9wYWNpdHk9IjAuMyIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3ICAgICIgeDE9IjQxMiIgeTE9Ii0yMjcuNiIgeDI9IjYxMiIgeTI9Ii0yMjcuNiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjNDQ5RkRCIiB4MT0iNDEyIiB5MT0iLTIyNC41IiB4Mj0iNjEyIiB5Mj0iLTIyNC41Ii8+PGxpbmUgZGlzcGxheT0iaW5saW5lIiBvcGFjaXR5PSIwLjMiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIHgxPSI0MTIiIHkxPSItMjIxLjQiIHgyPSI2MTIiIHkyPSItMjIxLjQiLz48bGluZSBkaXNwbGF5PSJpbmxpbmUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzQ0OUZEQiIgeDE9IjQxMiIgeTE9Ii0yMTguMiIgeDI9IjYxMiIgeTI9Ii0yMTguMiIvPjxsaW5lIGRpc3BsYXk9ImlubGluZSIgb3BhY2l0eT0iMC4zIiBmaWxsPSJub25lIiBzdHJva2U9IiM0NDlGREIiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgICAgIiB4MT0iNDEyIiB5MT0iLTIxNS4xIiB4Mj0iNjEyIiB5Mj0iLTIxNS4xIi8+PC9nPjxwYXRoIGZpbGw9IiM5RUEzQTgiIHN0cm9rZT0iIzlFQTNBOCIgc3Ryb2tlLXdpZHRoPSIxMSIgZD0iTTE4MS40LDUwLjdsLTY1LTM2LjdjLTguOS01LTI0LjEtNS0zMi45LDBsLTY1LDM2LjdjLTUsMi44LTcuNyw2LjctNy43LDExLjFzMi43LDguMyw3LjcsMTEuMWw2NSwzNi43YzQuNCwyLjUsMTAuMywzLjksMTYuNSwzLjlzMTItMS40LDE2LjUtMy45bDY1LTM2LjdjNS0yLjgsNy43LTYuNyw3LjctMTEuMVMxODYuMyw1My41LDE4MS40LDUwLjdMMTgxLjQsNTAuN3ogTTE3OC40LDY3LjZsLTY1LDM2LjdjLTcsMy45LTIwLDQtMjcsMGwtNjUtMzYuN2MtMy0xLjctNC42LTMuOC00LjYtNS44YzAtMiwxLjctNC4yLDQuNi01LjhsNjUtMzYuN2MzLjUtMiw4LjQtMy4xLDEzLjUtMy4xYzUuMSwwLDEwLDEuMSwxMy41LDMuMWw2NSwzNi43YzMsMS43LDQuNiwzLjgsNC42LDUuOEMxODMuMSw2My44LDE4MS40LDY1LjksMTc4LjQsNjcuNnogTTE4MS40LDg5LjJjLTEuNC0wLjgtMy4zLTAuMy00LjEsMS4xYy0wLjgsMS40LTAuMywzLjMsMS4xLDQuMWMzLDEuNyw0LjYsMy44LDQuNiw1LjhzLTEuNyw0LjItNC42LDUuOGwtNjUsMzYuN2MtNy4zLDQuMS0xOS43LDQuMS0yNywwbC02NS0zNi43Yy0zLTEuNy00LjYtMy44LTQuNi01LjhzMS43LTQuMiw0LjYtNS44YzEuNC0wLjgsMi0yLjcsMS4xLTQuMWMtMC44LTEuNS0yLjctMi00LjEtMS4xYy01LDIuOC03LjcsNi43LTcuNywxMS4xczIuNyw4LjMsNy43LDExLjFsNjUsMzYuN0M4OCwxNTAuNyw5NCwxNTIsOTkuOSwxNTJzMTEuOS0xLjMsMTYuNS0zLjlsNjUtMzYuN2M1LTIuOCw3LjctNi43LDcuNy0xMS4xQzE4OS4xLDk2LDE4Ni4zLDkyLDE4MS40LDg5LjJMMTgxLjQsODkuMnogTTE4MS40LDEyN2MtMS40LTAuOC0zLjMtMC4zLTQuMSwxLjFjLTAuOCwxLjQtMC4zLDMuMywxLjEsNC4xYzMsMS43LDQuNiwzLjgsNC42LDUuOGMwLDItMS43LDQuMi00LjYsNS44bC02NSwzNi43Yy03LjMsNC4xLTE5LjcsNC4xLTI3LDBsLTY1LTM2LjdjLTMtMS43LTQuNi0zLjgtNC42LTUuOGMwLTIsMS43LTQuMiw0LjYtNS44YzEuNC0wLjgsMi0yLjcsMS4xLTQuMWMtMC44LTEuNC0yLjctMi00LjEtMS4xYy01LDIuOC03LjcsNi43LTcuNywxMS4xYzAsNC4zLDIuNyw4LjMsNy43LDExLjFsNjUsMzYuN2M0LjYsMi42LDEwLjUsMy45LDE2LjUsMy45czExLjktMS4zLDE2LjUtMy45bDY1LTM2LjdjNS0yLjgsNy43LTYuNyw3LjctMTEuMUMxODkuMSwxMzMuNywxODYuMywxMjkuOCwxODEuNCwxMjdMMTgxLjQsMTI3eiIvPjwvc3ZnPg==',
            60);
//        add_submenu_page('lerp-system-status',
//            'Lerp主题设置',
//            esc_html__('System Status', 'lerp'),
//            'administrator',
//            'lerp-system-status',
//            'lerp_welcome_page');
    }
}

add_action('admin_menu', 'lerp_admin_menu');


/**
 * Remove top margin for admin bar
 */
function lerp_remove_adminbar_margin()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'lerp_remove_adminbar_margin');

if ( is_admin() && isset($_GET['activated']) && $pagenow == "themes.php" ) {
    header('Location: ' . admin_url() . 'admin.php?page=lerp-system-status&first=true');
}

function lerp_ot_admin_script()
{
    wp_enqueue_script('lerp-ot-admin',
        get_template_directory_uri() . '/assets/js/min/ot-admin-extended.min.js',
        array('ot-admin-js'),
        LERP_VERSION,
        false);
    wp_enqueue_script('ot-admin-fontpicker',
        get_template_directory_uri() . '/assets/js/min/jquery.fonticonpicker.min.js',
        array('ot-admin-js'),
        LERP_VERSION,
        false);
}

add_action('ot_admin_scripts_after', 'lerp_ot_admin_script');

function lerp_load_admin_script()
{
    wp_enqueue_script('admin_lerp_js',
        get_template_directory_uri() . '/assets/js/min/admin_lerp.min.js',
        array('jquery', 'jquery-ui-tabs', 'jquery-ui-dialog'),
        LERP_VERSION,
        true);
    wp_enqueue_style('wp-jquery-ui-dialog');
    wp_enqueue_script('jquery-tiptip',
        get_template_directory_uri() . '/assets/js/min/jquery.tipTip.min.js',
        array('jquery'),
        LERP_VERSION,
        true);

    // Get media categories (used for the Media Upload dropdown filter)
    $terms = get_terms('media-category',
        array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => true,
        ));

    $site_parameters = array(
        'OT_PATH' => OT_URL,
        'theme_directory' => get_template_directory_uri(),
        'admin_ajax' => admin_url('admin-ajax.php'),
        'ajax_save_message' => array(
            'success' => esc_html__('Theme Options saved!', 'lerp'),
            'error' => esc_html__('Theme Options not saved.', 'lerp'),
        ),
        'http_errors' => array(
            '400' => esc_html__(' Error: 400 - Request content was invalid.', 'lerp'),
            '401' => esc_html__(' Error: 401 - Unauthorized access.', 'lerp'),
            '403' => esc_html__(' Error: 403 - Forbidden resource can\'t be accessed.', 'lerp'),
            '404' => esc_html__(' Error: 404 - Requested page not found.', 'lerp'),
            '408' => esc_html__(' Error: 408 - Request time out.', 'lerp'),
            '500' => esc_html__(' Error: 500 - Internal server error.', 'lerp'),
            '503' => esc_html__(' Error: 503 - Service unavailable.', 'lerp'),
            'login' => esc_html__(' Your session has expired.', 'lerp'),
            'unknown' => esc_html__(' Unknown error.', 'lerp')
        ),
        'modal_buttons' => array(
            'cancel' => esc_html__('Cancel', 'lerp'),
            'confirm' => esc_html__('Confirm', 'lerp'),
        ),
        'media_cats' => array(
            'all_label' => esc_html__('All Media Categories', 'lerp'),
            'terms' => $terms,
        )
    );
    wp_localize_script('admin_lerp_js', 'SiteParameters', $site_parameters);
}

add_action('admin_enqueue_scripts', 'lerp_load_admin_script');

function lerp_init_admin_css()
{
    $production_mode = ot_get_option('_lerp_production');
    $resources_version = ($production_mode === 'on') ? null : rand();
    wp_enqueue_style('ot-admin',
        get_template_directory_uri() . '/inc/theme-options/assets/css/ot-admin.css',
        false,
        $resources_version);
    wp_enqueue_style('admin-lerp-icons',
        get_template_directory_uri() . '/library/css/lerp-icons.css',
        false,
        $resources_version);
    $back_css = get_template_directory() . '/assets/css/';
    $ot_id = is_multisite() ? get_current_blog_id() : '';
    if ( file_exists($back_css . 'admin-custom' . $ot_id . '.css') && wp_is_writable($back_css . 'admin-custom' . $ot_id . '.css') ) {
        wp_enqueue_style('lerp-custom-style',
            get_template_directory_uri() . '/assets/css/admin-custom' . $ot_id . '.css',
            false,
            $resources_version);
    } else {
        $styles = lerp_create_dynamic_css();
        wp_add_inline_style('ot-admin', lerp_compress_css_inline($styles['admin']));
    }
    $fonts = get_option('lerp_font_options');
    if ( isset($fonts['font_stack']) && $fonts['font_stack'] !== '[]' ) {

        $upload_dir = wp_upload_dir();
        $site_url = get_option('upload_url_path');
        $scheme = parse_url($site_url, PHP_URL_SCHEME);
        $upload_dir_url = set_url_scheme($upload_dir['baseurl'], $scheme);

        if ( @file_exists(trailingslashit($upload_dir['basedir']) . 'lerp-fonts/lerpfont.css') ) wp_enqueue_style('uf-font-squirrel',
            $upload_dir_url . '/lerp-fonts/lerpfont.css',
            false,
            $resources_version);
    }
}

add_action('admin_init', 'lerp_init_admin_css');


if ( !function_exists('lerp_get_current_post_type') ) {

    /**
     * Get post type in any case.
     * @since Lerp 1.0.0
     */
    function lerp_get_current_post_type()
    {
        global $post, $typenow, $current_screen, $pagenow;
        if ( $post && $post->post_type ) {
            return $post->post_type;
        } elseif ( $typenow ) {
            return $typenow;
        } elseif ( $current_screen && $current_screen->post_type ) {
            return $current_screen->post_type;
        } elseif ( isset($_REQUEST['post_type']) ) {
            return sanitize_key($_REQUEST['post_type']);
        } elseif ( isset($_GET['post']) && $_GET['post'] != -1 ) {
            $thispost = get_post($_GET['post']);
            if ( $thispost )
                return $thispost->post_type;
            else
                return null;
        } else {
            if ( $pagenow === 'post-new.php' )
                return 'post';
            else
                return null;
        }
    }
}

if ( !function_exists('lerp_get_post_types') ) {
    function lerp_get_post_types($built_in = false)
    {
        $args = array(
            'public' => true,
            '_builtin' => false
        );
        $output = 'names'; // names or objects, note names is the default
        $operator = 'and'; // 'and' or 'or'
        $get_post_types = get_post_types($args, $output, $operator);
        $lerp_post_types = array();
        if ( ($key = array_search('lerpblock', $get_post_types)) !== false ) {
            unset($get_post_types[$key]);
        }
        if ( ($key = array_search('lerp_gallery', $get_post_types)) !== false ) {
            unset($get_post_types[$key]);
        }
        if ( $built_in ) $lerp_post_types[] = 'post';
        if ( $built_in ) $lerp_post_types[] = 'page';
        foreach ( $get_post_types as $key => $value ) {
            $lerp_post_types[] = $key;
        }

        $lerp_post_types[] = 'author';

        return $lerp_post_types;
    }
}