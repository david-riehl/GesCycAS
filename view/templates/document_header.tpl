<!DOCTYPE html>
<html>
	<head>
		<title>{$head_title}</title>
		<meta charset="{$head_charset}">
		<meta name="generator" content="{$generator}">
{section name=head_sec0 loop=$head_metas}
		<meta name="{$head_metas[head_sec0].name}" content="{$head_metas[head_sec0].content}">
{/section}
{section name=head_sec1 loop=$head_styles}
		<link rel="stylesheet" type="text/css" href="{$URI_root}/{$head_styles[head_sec1]}">
{/section}
{section name=head_sec2 loop=$head_scripts}
		<script src="{$URI_root}/{$head_scripts[head_sec2]}"></script>
{/section}
{if $head_favicon}
		<link rel="shortcut icon" type="image/x-icon" href="{$URI_root}/favicon.ico">
{/if}
	</head>
	<body>
		<div id="container">
{if $debug_mode}
			<pre>
				Debug Mode : [ ON ]
{if !empty($debug_var)}
				<table style="border:1px solid black; color:gray;">
				<caption style="text-align:left;">You have {$debug_var|@count} debugged variable(s).</caption>
{section name=debug_sec0 loop=$debug_var}
					<tr>
						<td>
							<table style="border:1px solid black; color:gray;">
								<caption style="text-align:left;">Message #{$smarty.section.debug_sec0.index + 1}</caption>
								<tr>
									<td style="vertical-align:top;"><label>Variable : </label></td>
									<td>{$debug_var[debug_sec0].var_name}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>Dump : </label></td>
									<td><pre>{$debug_var[debug_sec0].var_dump}</pre></td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td>{$debug_var[debug_sec0].file}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : <label></td>
									<td>{$debug_var[debug_sec0].line}</td>
								</tr>
							</table>
						</td>
					</tr>
{/section}
				</table>
{/if}
{if !empty($debug_msg)}
				<table style="border:1px solid black; color:gray;">
				<caption style="text-align:left;">You have {$debug_msg|@count} debug message(s)</caption>
{section name=debug_sec1 loop=$debug_msg}
					<tr>
						<td>
							<table style="border:1px solid black; color:gray;">
								<caption style="text-align:left;">Message #{$smarty.section.debug_sec1.index + 1}</caption>
								<tr>
									<td style="vertical-align:top;"><label>message : </label></td>
									<td>{$debug_msg[debug_sec1].msg}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td>{$debug_msg[debug_sec1].file}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : </label></td>
									<td>{$debug_msg[debug_sec1].line}</td>
								</tr>
							</table>
						</td>
					</tr>
{/section}
				</table>
{/if}
{if !empty($warning_msg)}
				<table style="border:1px solid black; color:orange;">
				<caption style="text-align:left;">You have {$warning_msg|@count} warning message(s)</caption>
{section name=debug_sec2 loop=$warning_msg}
					<tr>
						<td>
							<table style="border:1px solid black; color:orange;">
								<caption style="text-align:left;">Message #{$smarty.section.debug_sec2.index + 1}</caption>
								<tr>
									<td style="vertical-align:top;"><label>message : </label></td>
									<td>{$warning_msg[debug_sec2].msg}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td>{$warning_msg[debug_sec2].file}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : </label></td>
									<td>{$warning_msg[debug_sec2].line}</td>
								</tr>
							</table>
						</td>
					</tr>
{/section}
				</table>
{/if}
{if !empty($error_msg)}
				<table style="border:1px solid black; color:red;">
				<caption style="text-align:left;">You have {$error_msg|@count} error message(s)</caption>
{section name=debug_sec3 loop=$error_msg}
					<tr>
						<td>
							<table style="border:1px solid black; color:red;">
								<caption style="text-align:left;">Message #{$smarty.section.debug_sec3.index + 1}</caption>
								<tr>
									<td style="vertical-align:top;"><label>message : </label></td>
									<td>{$error_msg[debug_sec3].msg}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td>{$error_msg[debug_sec3].file}</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : </label></td>
									<td>{$error_msg[debug_sec3].line}</td>
								</tr>
							</table>
						</td>
					</tr>
{/section}
				</table>
{/if}
			</pre>
{/if}
{include file="banner.tpl"}
{include file="menu_top.tpl"}