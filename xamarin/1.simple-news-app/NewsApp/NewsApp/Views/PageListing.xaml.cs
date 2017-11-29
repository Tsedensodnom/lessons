using NewsApp.Views.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace NewsApp.Views
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class PageListing : ContentPage
    {
        public PageListingModel Model { get; set; }

        public PageListing()
        {
            InitializeComponent();

            if (Model == null)
            {
                Model = new PageListingModel();
            }

            BindingContext = Model;
        }

        protected override void OnAppearing()
        {
            base.OnAppearing();

            listView.BeginRefresh();
        }

        private void ListView_Refreshing(object sender, EventArgs e)
        {
            Task.Factory.StartNew(() =>
            {
                Model.Fetch(true);
            }).ContinueWith((e1) =>
            {
                Device.BeginInvokeOnMainThread(() =>
                {
                    listView.EndRefresh();
                });
            });
        }

        private void ListView_ItemSelected(object sender, SelectedItemChangedEventArgs e)
        {
            if (e.SelectedItem != null)
            {
                App.Nav.PushAsync(new PageDetail
                {
                    BindingContext = (e.SelectedItem as PostItemModel),
                });

                listView.SelectedItem = null;
            }
        }

        private void ListView_ItemAppearing(object sender, ItemVisibilityEventArgs e)
        {

        }
    }
}