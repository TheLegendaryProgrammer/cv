using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations.Schema;

#nullable disable

namespace MusorApp3.Models
{
    public partial class UserFavourite : StandardEntity
    {
        public virtual Channel Channel { get; set; }
        [Column("Channel"), ForeignKey(nameof(Channel))]
        public int? ChannelId { get; set; }

        public virtual User User { get; set; }
        [Column("User"), ForeignKey(nameof(User))]
        public int? UserId { get; set; }
        public string Name { get; set; }
    }
}
