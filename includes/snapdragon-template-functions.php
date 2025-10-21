<?php
/**
 * Template Functions.
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');



if ( ! function_exists( 'snapdragon_main_header_navigation_before' ) ) {
	
	function snapdragon_main_header_navigation_before() {
		?>
			<header id="snapdragon-main-header">
				<p>HEADER</p>
			</header>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_google_site_verification' ) ) {
	/**
	 * Inject google datas to <head> meta
	 * @since 1.0
	 */
	function snapdragon_google_site_verification() {
		
		$verification = get_option( 'snapdragon_google_verification' , [ 'meta' => 'D2qQKJUQ9kPwNYZI5PFhqoXEXd1hap1WrBz_Vv51tjk' , 'script' => 'ca-pub-4690077027254207'] );

		?>
			<meta name="google-site-verification" content="<?php esc_attr_e( $verification[ 'meta' ] )?>" />
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php esc_attr_e( $verification[ 'script' ] )?>"
			crossorigin="anonymous"></script>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_barion_code_inject' ) ) {
	/**
	 * Inject barion code to <head>
	 * @since 1.0
	 */
	function snapdragon_barion_code_inject() {

				
		if ( is_home() || is_front_page() ) {
			return;
		}

		?>
		<script>
			// Create BP element on the window
			window["bp"] = window["bp"] || function () {
				(window["bp"].q = window["bp"].q || []).push(arguments);
			};
			window["bp"].l = 1 * new Date();

			// Insert a script tag on the top of the head to load bp.js
			scriptElement = document.createElement("script");
			firstScript = document.getElementsByTagName("script")[0];
			scriptElement.async = true;
			scriptElement.src = 'https://pixel.barion.com/bp.js';
			firstScript.parentNode.insertBefore(scriptElement, firstScript);
			window['barion_pixel_id'] = '<?php esc_attr_e(get_option( 'snapdragon_barion_pixel_id' , '' ))?>';            

			// Send init event
			bp('init', 'addBarionPixelId', window['barion_pixel_id']);
		</script>

		<noscript>
			<img height="1" width="1" style="display:none" alt="Barion Pixel" src="https://pixel.barion.com/a.gif?ba_pixel_id='<?php esc_attr_e(get_option( 'snapdragon_barion_pixel_id' , '' ))?>'&ev=contentView&noscript=1">
		</noscript>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_page_header' ) ) {
	/**
	 * Display the page header
	 * @since 1.0
	 */
	function snapdragon_page_header() {
		if ( is_front_page() ) {
			return;
		}

		?>
		<header class="entry-header">
			<?php

			if ( ! is_page_template( 'template-homepage.php' ) ) {
				snapdragon_post_thumbnail( 'full' );
			}

			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_page_content' ) ) {
	/**
	 * Display the post content
	 * @since 1.0
	 */
	function snapdragon_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'snapdragon' ),
						'after'  => '</div>',
					)
				);
			?>
		</div>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_display_comments' ) ) {
	/**
	 * Snapdragon display comments
	 * @since  1.0
	 */
	function snapdragon_display_comments() {
		if ( comments_open() || 0 !== intval( get_comments_number() ) ) :
			comments_template();
		endif;
	}
}



if ( ! function_exists( 'snapdragon_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0
	 */
	function snapdragon_post_header() {
		?>
		<header class="entry-header">
		<?php

		/**
		 * Functions hooked in to snapdragon_post_header_before action.
		 *
		 * @hooked snapdragon_post_meta - 10
		 */
		do_action( 'snapdragon_post_header_before' );

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}

		do_action( 'snapdragon_post_header_after' );
		?>
		</header>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_post_meta' ) ) {
	/**
	 * Display the post meta
	 * @since 1.0
	 */
	function snapdragon_post_meta() {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Posted on.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$output_time_string = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string );

		$posted_on = '
			<span class="posted-on">' .
			/* translators: %s: post date */
			sprintf( __( 'Posted on %s', 'snapdragon' ), $output_time_string ) .
			'</span>';

		// Author.
		$author = sprintf(
			'<span class="post-author">%1$s <a href="%2$s" class="url fn" rel="author">%3$s</a></span>',
			__( 'by', 'snapdragon' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);

		// Comments.
		$comments = '';

		if ( ! post_password_required() && ( comments_open() || 0 !== intval( get_comments_number() ) ) ) {
			$comments_number = get_comments_number_text( __( 'Leave a comment', 'snapdragon' ), __( '1 Comment', 'snapdragon' ), __( '% Comments', 'snapdragon' ) );

			$comments = sprintf(
				'<span class="post-comments">&mdash; <a href="%1$s">%2$s</a></span>',
				esc_url( get_comments_link() ),
				$comments_number
			);
		}

		echo wp_kses(
			sprintf( '%1$s %2$s %3$s', $posted_on, $author, $comments ),
			array(
				'span' => array(
					'class' => array(),
				),
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'rel'   => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
			)
		);
	}
}



if ( ! function_exists( 'snapdragon_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0
	 */
	function snapdragon_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to snapdragon_post_content_before action.
		 *
		 * @hooked snapdragon_post_thumbnail - 10
		 */
		do_action( 'snapdragon_post_content_before' );

		the_content(
			sprintf(
				/* translators: %s: post title */
				__( 'Continue reading %s', 'snapdragon' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		do_action( 'snapdragon_post_content_after' );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'snapdragon' ),
				'after'  => '</div>',
			)
		);
		?>
		</div>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.0
	 */
	function snapdragon_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		}
	}
}



if ( ! function_exists( 'snapdragon_edit_post_link' ) ) {
	/**
	 * Display the edit link
	 * @since 1.0
	 */
	function snapdragon_edit_post_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'snapdragon' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
}



if ( ! function_exists( 'snapdragon_post_taxonomy' ) ) {
	/**
	 * Display the post taxonomies
	 * @since 1.0
	 */
	function snapdragon_post_taxonomy() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'snapdragon' ) );

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'snapdragon' ) );
		?>

		<aside class="entry-taxonomy">
			<?php if ( $categories_list ) : ?>
			<div class="cat-links">
				<?php echo esc_html( _n( 'Category:', 'Categories:', count( get_the_category() ), 'snapdragon' ) ); ?> <?php echo wp_kses_post( $categories_list ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $tags_list ) : ?>
			<div class="tags-links">
				<?php echo esc_html( _n( 'Tag:', 'Tags:', count( get_the_tags() ), 'snapdragon' ) ); ?> <?php echo wp_kses_post( $tags_list ); ?>
			</div>
			<?php endif; ?>
		</aside>

		<?php
	}
}



if ( ! function_exists( 'snapdragon_post_nav' ) ) {
	// Display navigation to next/previous post when applicable.
	function snapdragon_post_nav() {
		$args = array(
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'snapdragon' ) . ' </span>%title',
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'snapdragon' ) . ' </span>%title',
		);
		the_post_navigation( $args );
	}
}



if ( ! function_exists( 'snapdragon_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function snapdragon_paging_nav() {
		global $wp_query;

		$args = array(
			'type'      => 'list',
			'next_text' => _x( 'Next', 'Next post', 'snapdragon' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'snapdragon' ),
		);

		the_posts_pagination( $args );
	}
}



if ( ! function_exists( 'snapdragon_comment' ) ) {
	/**
	 * Snapdragon comment template
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int   $depth the comment depth.
	 * @since 1.0
	 */
	function snapdragon_comment( $comment, $args, $depth ) {
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-body">
		<div class="comment-meta commentmetadata">
			<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 128 ); ?>
			<?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'snapdragon' ), get_comment_author_link() ); ?>
			</div>
			<?php if ( '0' === $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'snapdragon' ); ?></em>
				<br />
			<?php endif; ?>

			<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
				<?php echo '<time datetime="' . esc_attr( get_comment_date( 'c' ) ) . '">' . esc_html( get_comment_date() ) . '</time>'; ?>
			</a>
		</div>
		<?php if ( 'div' !== $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-content">
		<?php endif; ?>
		<div class="comment-text">
		<?php comment_text(); ?>
		</div>
		<div class="reply">
		<?php
		comment_reply_link(
			array_merge(
				$args,
				array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
				)
			)
		);
		?>
		<?php edit_comment_link( __( 'Edit', 'snapdragon' ), '  ', '' ); ?>
		</div>
		</div>
		<?php if ( 'div' !== $args['style'] ) : ?>
		</div>
		<?php endif; ?>
		<?php
	}
}