using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace NewsApp.Views.Models
{

    public class PageMenuModel
    {
        public List<MenuItemModel> ItemsSource { get; set; }
        public string CoverImage { get; set; }

        public PageMenuModel()
        {
            CoverImage = "https://images.unsplash.com/photo-1499092346589-b9b6be3e94b2?auto=format&fit=crop&w=300&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D";

            ItemsSource = new List<MenuItemModel>();
            ItemsSource.Add(new MenuItemModel
            {
                Title = "Home",
                Icon = "fa-home",
            });
            ItemsSource.Add(new MenuItemModel
            {
                Title = "Trending",
                Icon = "fa-fire",
                Command = new Command(() =>
                {
                    App.Nav.PushAsync(new PageListing
                    {
                        Title = "Trending",
                    });
                }),
            });
            ItemsSource.Add(new MenuItemModel
            {
                Title = "Categories",
                Icon = "fa-list-alt",
                Command = new Command(() =>
                {
                    App.Nav.DisplayAlert("Page", "Categories page will be pushed", "OK");
                }),
            });
            ItemsSource.Add(new MenuItemModel
            {
                Title = "Search",
                Icon = "fa-search",
                Command = new Command(() =>
                {
                    App.Nav.PushAsync(new PageSearch
                    {
                        Title = "Search",
                    });
                }),
            });
            ItemsSource.Add(new MenuItemModel
            {
                Title = "About",
                Icon = "fa-info",
                Command = new Command(() =>
                {
                    App.Nav.DisplayAlert("Page", "About page will be pushed", "OK");
                }),
            });
            ItemsSource.Add(new MenuItemModel
            {
                Title = "Settings",
                Icon = "fa-cog",
                Command = new Command(() =>
                {
                    App.Nav.DisplayAlert("Page", "Settings page will be pushed", "OK");
                }),
            });
        }
    }
}
