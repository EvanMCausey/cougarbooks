<?php

// Uploads a book photo passed via POST, associating it with the current ad
function upload_book_image( $ad_id ) {
	global $db;

	if ( ! empty( $_FILES['book_image']['name'] ) ) {

		$ad = $db->get_ad( $ad_id );

		$upload_file_path_info = pathinfo( $_FILES['book_image']['name'] );
		$upload_file_ext = $upload_file_path_info['extension'];
		$upload_file_full_name = "ad-$ad_id.$upload_file_ext";
		$upload_file_rel_path = CB_AD_PHOTO_PATH_BASE . '/' . $upload_file_full_name;
		// The absolute path to the file on the server
		$upload_file_abs_path = dirname( dirname( dirname( __FILE__ ) ) ) . '/' . $upload_file_rel_path;

	 	$upload_status = move_uploaded_file( $_FILES['book_image']['tmp_name'], $upload_file_abs_path );
		if ( $upload_status ) {

			$query = "UPDATE ad
				SET path_to_picture = :picture_path
				WHERE ad_id = :ad_id";
			$db->query( $query, array(
				'ad_id' => $ad_id,
				'picture_path' => $upload_file_full_name
			) );

		} else {

			error_log( "Book photo upload failed for ad $ad_id" );
			return false;

		}

	}

	return true;

}

// Deletes an existing book photo for the ad witht the given ID
function delete_book_image( $ad_id ) {
	global $db;

	// Only delete book image if a replacement has been uploaded
	if ( ! empty( $_FILES['book_image']['name'] ) ) {

		// Retrieve path to uploaded image for this ad
		$query = 'SELECT path_to_picture FROM ad WHERE ad_id = :ad_id';
		$ad = $db->fetchOne( $query, array(
			'ad_id' => $ad_id
		) );
		$book_image_path = $_SERVER['DOCUMENT_ROOT'] . '/' . CB_AD_PHOTO_PATH_BASE . '/' . $ad['path_to_picture'];
		// // Only delete image if ad and the corresponding image file exist
		if ( ! empty( $ad ) && ! empty( $ad['path_to_picture'] ) && file_exists( $book_image_path ) ) {
			unlink( $book_image_path );
		}

	}

}

?>
