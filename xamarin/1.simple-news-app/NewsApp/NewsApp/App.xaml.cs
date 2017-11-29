using FormsPlugin.Iconize;
using NewsApp.Views;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Xamarin.Forms;

namespace NewsApp
{
    public partial class App : Application
    {
        public static IconNavigationPage Nav;
        public static PageMaster Master;

        public App()
        {
            InitializeComponent();

            Nav = new IconNavigationPage(new PageListing
            {
                ToolbarItems =
                {
                    new IconToolbarItem
                    {
                        Icon = "fa-search",
                        IconColor = Color.White,
                        Command = new Command(() =>
                        {
                            App.Nav.PushAsync(new PageSearch());
                        }),
                    }
                },
            });

            Master = new PageMaster();
            MainPage = Master;
        }

        protected override void OnStart()
        {
            // Handle when your app starts
        }

        protected override void OnSleep()
        {
            // Handle when your app sleeps
        }

        protected override void OnResume()
        {
            // Handle when your app resumes
        }
    }
}
