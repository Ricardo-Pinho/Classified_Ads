This Website consists of Adverts GET pages.

The main page is:

classifieds/adverts -> contains a list with all adverts in the database
					-> contains a menu with categories, subcategories, and types that
						allows for a search by a specific category, subcategory or type.
						Still in the menu, every page can be displayed in XML or JSON.
						This can be done manually by adding .xml or .json to the url.
					-> pagination automated by ajax

					-> A category bar, that displays the current category/subcategory/type being searched. If the page displays a specific advert, this category bar shows its category.

					-> Every advert can be clicked to display specific information about the advert. By hovering over the advert, information placed by the seller is displayed.

classifieds/adverts/[:id] -> this page contains specific information about the advert.
							This contains The full description, category/subcategory/type, and post date of the advert.

						  -> The same menu and category bar are available.

						  -> Contains a slideshow with other images of the advert, if available.