-rw-r--r-- 1 b983040004 b983040004  883 2011-05-23 02:43 connect.php		for debug
-rw-r--r-- 1 b983040004 b983040004 1559 2011-05-22 00:11 database.sql		

-rw-r--r-- 1 b983040004 b983040004  705 2011-05-23 00:57 fDelete.php		finished	Remove device
-rw-r--r-- 1 b983040004 b983040004   12 2011-05-22 21:57 fEdit.php		finished	Change device info
-rw-r--r-- 1 b983040004 b983040004   12 2011-05-22 23:35 fList.php		finished	List all devices
-rw-r--r-- 1 b983040004 b983040004  573 2011-05-22 20:30 fLogin.php		finished	Login Authorize
-rw-r--r-- 1 b983040004 b983040004  921 2011-05-23 00:50 fNew.php		finished	New device
-rw-r--r-- 1 b983040004 b983040004  475 2011-05-22 23:37 fQuery.php		finished	Query for device by id
							 fBuilding.php		construct	List all building numbers
												(Index;Building Name;numbers used in database)

-rw-r--r-- 1 b983040004 b983040004  799 2011-05-23 01:23 fRegister.php		finish		Add new user
-rw-r--r-- 1 b983040004 b983040004  742 2011-05-23 01:02 fUnregister.php	finish		Delete user
-rw-r--r-- 1 b983040004 b983040004   11 2011-05-22 22:01 fAuthority.php		untouched	change authority
							 fUsers.php		finish		List all Users (Don't touch the authorized part, just don't give anything)
							 fUserEdit.php		finish		Change User Password

-rw-r--r-- 1 b983040004 b983040004  355 2011-05-21 22:22 index.html		for debug
-rw-r--r-- 1 b983040004 b983040004  112 2011-05-23 00:24 status.com		readme
drwxr-xr-x 2 b983040004 b983040004 4096 2011-05-22 23:23 underconstruct/	not important
